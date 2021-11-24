<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsibilities', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount_affect',8,2);
            $table->enum('type',[1,2,3])->default(1);
            $table->decimal('amount',8,2);
            $table->date('date_notify');
            $table->string('noEF',10);
           
           /* $table->date('date_ap')->nullable();
            $table->enum('result_ap',[1,2,3])->nullable();

            $table->date('date_rev')->nullable();
            $table->enum('result_rev',[1,2,3])->nullable();*/
            $table->string('agreement')->nullable();
           /* $table->date('date_pc')->nullable();
            $table->enum('result_pc',[1,2,3])->nullable();*/
            
            $table->string('observ')->nullable();

            $table->enum('status',[1,2,3])->nullable()->default(1);
           $table->boolean('approved')->nullable();

            $table->unsignedBigInteger('worker_id');
            $table->unsignedBigInteger('fact_id');
            $table->unsignedBigInteger('entity_id');


            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
            $table->foreign('fact_id')->references('id')->on('facts')->onDelete('cascade');
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
        Schema::dropIfExists('responsibilities');
    }
}
