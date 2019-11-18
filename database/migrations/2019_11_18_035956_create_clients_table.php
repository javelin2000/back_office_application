<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->date('date_of_birth');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number');
            $table->string('address');
            $table->string('country');
            $table->string('trading_account_number');
            $table->bigInteger('balance')->default(0);
            $table->integer('open_trades')->default(0);
            $table->integer('close_trades')->default(0);

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
        Schema::dropIfExists('clients');
    }
}
