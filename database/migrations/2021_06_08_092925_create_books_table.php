<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('version');
            $table->string('version_date');
            $table->text('description');
            $table->string('poster')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('publishing_house_id');
            $table->unsignedBigInteger('category_id');

            $table->timestamps();
            $table->foreign('publishing_house_id')->references('id')->on('publishing_houses')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
