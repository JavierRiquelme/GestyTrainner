<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('precio');
            $table->string('image',255);
            $table->string('hora',20);
            $table->enum('posted', ['si', 'no'])->default('no');
            $table->string('color',20);
            $table->string('textcolor',20);
            $table->dateTime('start');
            $table->dateTime('end');
            $table->timestamps();
            $table->foreignId('category_id') 
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreignId('user_id') 
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clases');
    }
}
