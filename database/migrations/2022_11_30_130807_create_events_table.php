<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('venue');
            $table->integer('fee');
            $table->date('date');
            $table->date('registration_deadline');
            $table->text('payment_details')->nullable();
            $table->tinyInteger('type')->comment('1=AGM,2=Get Together')->nullable();
            $table->tinyInteger('status')->comment('1=Active,0=Disable')->nullable();
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
        Schema::dropIfExists('events');
    }
}
