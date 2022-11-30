<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('payment_method')->nullable();
            $table->decimal('amount')->default(0)->nullable();
            $table->decimal('charge_fee')->default(0)->nullable();
            $table->decimal('total_amount')->default(0)->nullable();
            $table->string('bank_draft_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('bank_slip')->nullable();
            $table->string('mobile_banking_number')->nullable();
            $table->string('trx_id')->nullable();
            $table->string('rashid_no')->nullable();
            $table->string('serial_no')->nullable();
            $table->text('purpose')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=pending,1=paid,2=cancelled')->nullable();
            $table->tinyInteger('type')->default(0)->comment('1=member request, 2=event')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
