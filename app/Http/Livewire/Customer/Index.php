<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\{Queue,Customer};
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\ClientQueue;

class Index extends Component
{
	use WithPagination, ClientQueue;
    
    protected $paginationTheme = 'bootstrap';
    // public $listeners = ['render' => '$refresh'];

	public
		$name,
		$customer_id,
        $time_min,
		$updateMode = false;

    public function render()
    {
        //Consultando clientes por colas
        $queues1_query = $this->getQueue('cola 1');
        $queues2_query = $this->getQueue('cola 2');

        $update_queue = $this->updateClientsQueue($queues1_query, 'cola 1');
        $update_queue = $this->updateClientsQueue($queues2_query, 'cola 2');

        $customers_queue = Customer::where('status', false)
                                   ->with('queue')
                                   ->get();

    	$customers = Customer::with('queue')->paginate(8);

        return view('livewire.customer.index', compact('customers','customers_queue'));
    }

    public function modal($id)
    {
    	$this->fill([
    		'customer_id' => $id,
    	]);
    }

    //
    public function close()
    {
    	$this->reset([
            'name',
            'updateMode'
        ]);
    }

    //Metodo para el registro de cliente en base de datos asi mismo
    // asignacion de cola segun disponibilidad en min y seg
    public function store()
    {
        //Validación de campos en lado del servidor enviados desde el lado del cliente
	    $validatedData = $this->validate([
	        'name'      => 'required|string|min:3|max:255',
      	]);
        
        //Creación de un nuevo cliente
		$customer = Customer::create([
			'name' => $this->name,
		]);

        //Consultando clientes por colas
        $queues1_query = $this->getQueue('cola 1');
        $queues2_query = $this->getQueue('cola 2');

        //Consultando minutos por colas
        $minutes_elapsed_queue1 = $this->timeElapsed($queues1_query,'minutes_queue');
        $minutes_elapsed_queue2 = $this->timeElapsed($queues2_query,'minutes_queue');

        if($minutes_elapsed_queue1["minutes_queue"] == 0)
        {
            $customer->queue()->sync(1);
        }
        else{
            if($minutes_elapsed_queue2["minutes_queue"] == 0)
            {
                $customer->queue()->sync(2);
            }
            else{
                if($minutes_elapsed_queue1["minutes_queue"] < $minutes_elapsed_queue2["minutes_queue"])
                {
                    $customer->queue()->sync(1);
                }
                else{
                    $customer->queue()->sync(2);
                }
            }
        }

		$this->close();
    }

    public function destroy(Customer $customer)
    {
		$customer->delete();
        $this->close();
    }
}
