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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            //$table->bigInteger('categoria_id')->unsigned();
            $table->string('name');
            $table->integer('price')->unsigned();
            $table->text('description');
            $table->integer('amount')->unsigned();
            $table->string('photo')->default('');
            //$table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->timestamps();

            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
