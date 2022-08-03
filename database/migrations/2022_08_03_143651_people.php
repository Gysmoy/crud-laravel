<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');

            $table -> string('type_doc');
            $table -> string('number_doc');
            $table -> string('lastnames');
            $table -> string('names');
            $table -> date('birthdate');
            $table -> string('email')->nullable();
            $table -> string('phone');

            $table->bigInteger('country')->nullable()->unsigned();
            
            $table->timestamps();

            $table->foreign('country')->references('id')->on('countries')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
