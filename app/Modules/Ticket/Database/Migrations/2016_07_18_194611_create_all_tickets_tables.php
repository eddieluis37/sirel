<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTicketsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //Crea la tabla para almacenar tickets

        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('numero');
            $table->char('name', 15)->unique();
            $table->text('description')->nullable();
            $table->string('email')->nullable();
            $table->boolean('confirmed');
            $table->enum('estado', ['abierto', 'cerrado']);



            $table->timestamps();
            $table->softDeletes();

            $table->unsignedInteger('importance_id');
            $table->foreign('importance_id')->references('id')->on('importances');

            $table->unsignedInteger('note_id');
            $table->foreign('note_id')->references('id')->on('notes');

            $table->unsignedInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types')
                  ->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');


            $table->unsignedInteger('watcher_id');
            $table->foreign('watcher_id')->references('id')->on('watchers');



            /**
             * Reverse the migrations.
             *
             * @return void
             */
        });

    }
        public function down()

    {

        Schema::dropIfExists('tickets');


    }


}