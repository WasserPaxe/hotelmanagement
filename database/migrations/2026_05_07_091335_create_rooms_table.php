<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('number');
            $table->string('floor')->nullable();
            $table->string('description');
            $table->integer('bed')->nullable();
            $table->string('meal')->nullable();
            $table->string('phone')->nullable();
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade');
            $table->string('status');
            $table->decimal('price');
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
        Schema::dropIfExists('rooms');
    }
}
