<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->nullable();
            $table->string('clause');
            $table->decimal('amount',12,2);
            $table->date('date_ini');
            $table->date('date_top')->nullable();
            $table->date('date_answer')->nullable();
            $table->decimal('penalty',8,2)->nullable();
            $table->enum('status',[1,2])->nullable();
            $table->date('date_concil')->nullable();
            $table->integer('no_state')->nullable();
            $table->date('date_ec')->nullable();
            $table->date('date_tpp')->nullable();
            $table->date('date_rad')->nullable();
            $table->string('decision',255)->nullable();
            $table->string('observ')->nullable();
            $table->boolean('cpc')->default(0);


            $table->unsignedBigInteger('entityC_id');
            $table->unsignedBigInteger('entityR_id');
            $table->unsignedBigInteger('concept_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('pretension_id');
            $table->unsignedBigInteger('worker_id');

            $table->foreign('entityC_id')->references('id')->on('entities')->onDelete('cascade');
            $table->foreign('entityR_id')->references('id')->on('entities')->onDelete('cascade');
            $table->foreign('concept_id')->references('id')->on('concepts')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('pretension_id')->references('id')->on('pretensions')->onDelete('cascade');
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');         

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
        Schema::dropIfExists('claims');
    }
}
