<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinaryActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinary_actions', function (Blueprint $table) {
            $table->id();
            $table->date('date_notify')->nullable();
            $table->date('date_ejecution')->nullable();
            
            $table->integer('time_rehab')->nullable();
            $table->string('observ')->nullable();
          /*  $table->date('date_ap')->nullable();
            $table->enum('result_ap',[1,2,3])->nullable();

            $table->date('date_apOJL')->nullable();
            $table->enum('result_apOJL',[1,2,3])->nullable();

            $table->date('date_rev')->nullable();
            $table->enum('result_rev',[1,2,3])->nullable();*/

            $table->enum('status',[1,2,3,4])->nullable()->default(1);
            $table->boolean('approved')->nullable();
            $table->string('noEF',10);

            $table->unsignedBigInteger('worker_id');
            $table->unsignedBigInteger('fact_id');
            $table->unsignedBigInteger('action_id');
            $table->unsignedBigInteger('entity_id');

            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
            $table->foreign('fact_id')->references('id')->on('facts')->onDelete('cascade');
            $table->foreign('action_id')->references('id')->on('actions')->onDelete('cascade');
            $table->foreign('entity_id')->references('id')->on('entities')->onDelete('cascade');


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
        Schema::dropIfExists('disciplinary_actions');
    }
}
