<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appeals', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->enum('result',['CL','SL','CLP']);
            $table->enum('type',['OJL','Superior','Tribunal']);
            $table->string('observ')->nullable();

            $table->unsignedBigInteger('appealable_id');
            $table->string('appealable_type');             
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
        Schema::dropIfExists('appeals');
    }
}
