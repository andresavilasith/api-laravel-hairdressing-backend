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
        Schema::create('attention_date', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('date_id');
            $table->foreign('date_id')->references('id')->on('dates')->onDelete('cascade');
            $table->unsignedBigInteger('attention_id');
            $table->foreign('attention_id')->references('id')->on('attentions')->onDelete('cascade');
            $table->integer('tackled')->default(0);
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
        Schema::dropIfExists('attention_date');
    }
};
