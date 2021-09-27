<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Queue;
class QueueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///////////////////////////
        ////////  Queue 1  ///////
        /////////////////////////

        $queue_one = Queue::create([
            "name"  => "cola 1",
            "time" => "2",
        ]);

        ///////////////////////////
        ////////  Queue 2  ///////
        /////////////////////////

        $queue_two = Queue::create([
            "name"  => "cola 2",
            "time" => "3",
        ]);
    }
}
