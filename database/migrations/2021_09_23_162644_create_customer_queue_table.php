<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_queue', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()
                                        ->onUpdate('cascade')
                                        ->onDelete('cascade');

            $table->foreignId('queue_id')->constrained()
                                        ->onUpdate('cascade')
                                        ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_queue');
    }
}
