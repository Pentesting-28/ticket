<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\ClientQueue;
use App\Models\Queue;

class UpdateClientsQueue extends Command
{
    use ClientQueue;
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clientQueue:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualización de clientes en cola';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Consultando clientes por colas
        $queues1_query = $this->getQueue('cola 1');
        $queues2_query = $this->getQueue('cola 2');

        $update_queue = $this->updateClientsQueue($queues1_query, 'cola 1');
        $update_queue = $this->updateClientsQueue($queues2_query, 'cola 2');
    }
}
