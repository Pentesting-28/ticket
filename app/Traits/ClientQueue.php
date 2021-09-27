<?php
namespace App\Traits;

use App\Models\{Customer,Queue};
use Carbon\Carbon;
use DateTime;

trait ClientQueue
{
    public function getQueue($name)//Consultando Clientes por colas
    {
        $customer = Customer::where('status', false)
               ->with('queue')
               ->whereHas('queue', function ( $query ) use ( $name ) {
                    $query->where( 'name', $name );
               })
               ->get();

        return $customer;
    }

    public function timeElapsed($data, $opc)//Tiempo trascurrido
    {
        switch ($opc) {
            case 'minutes_queue':

                $minutes = [];

                foreach ($data as $date_queue)
                {
                    array_push($minutes,$date_queue->queue[0]->time);
                }

                $sum_minutes = array_sum($minutes);

                return [
                    "minutes_queue" => $sum_minutes
                ];

            break;
            case 'minutes_elapsed':

                $current_date = date("Y-m-d H:i:s");

                if(isset($data) && $data != null)
                {
                    $date1 = new DateTime($data);
                    $date2 = new DateTime($current_date);
                    $time_elapsed = $date1->diff($date2);

                    return [
                        "minutes" => $time_elapsed->i
                    ];
                }
            break;
        }
    }

    public function updateClientsQueue($data, $opc)
    {
        //Consultando minutos por colas
        $queues = Queue::all();

        switch ($opc) {
            case 'cola 1':
                $queue_time = $queues[0]->time;//Cola 1 Tiempo = 2 min
            break;
            case 'cola 2':
                $queue_time = $queues[1]->time;//Cola 2 Tiempo = 3 min
            break;
        }

        foreach ($data as $queue) {

            //Tiempo en minutos transcurrido atendiendo clientes cola 1
            $minutes_elapsed_queue = $this->timeElapsed($queue['created_at'],'minutes_elapsed');

            //Validamos el tiempo transcurrido del cliente en cola
            if($minutes_elapsed_queue["minutes"] >= $queue_time)
            {
                $queue->update(['status' => true]);//Actualizamos el estatus del Cliente en cola 
                $queue->fresh();
            }
        }
    }
}
?>