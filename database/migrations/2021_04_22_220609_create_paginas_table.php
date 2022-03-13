<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('route')->unique();
            $table->enum('status',['published','unpublished','draft'])->default('draft');
            $table->string('layout')->default('public');
            $table->longText('css')->nullable();
            $table->longText('body')->nullable();
            $table->longText('scripts')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_type')->nullable();
            $table->string('meta_image')->nullable();
            $table->string('meta_url')->nullable();
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
        Schema::dropIfExists('paginas');
    }
}
