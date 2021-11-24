<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('count_claims', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount',12,2);
            $table->decimal('amount_ini',12,2);
            $table->date('date_ini');
            $table->date('date_top')->nullable();
            $table->date('date_answer')->nullable();
            $table->boolean('approved')->default(0)->nullable();
            $table->date('date_concil')->nullable();
            $table->decimal('amountpaid',12,2);
            $table->integer('no_ec')->nullable();
            $table->date('date_ec')->nullable();
            $table->string('observ')->nullable();
            $table->enum('status',[1,2])->nullable();

            $table->unsignedBigInteger('entity_id');
            $table->unsignedBigInteger('worker_id');

            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');  
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
        Schema::dropIfExists('count_claims');
    }
}
