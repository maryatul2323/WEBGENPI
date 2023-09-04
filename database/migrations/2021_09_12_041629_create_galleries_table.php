<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->foreignId('travel_object_id')
                        ->nullable()
                        ->constrained()
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            $table->foreignId('souvenir_id')
                        ->nullable()
                        ->constrained()
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            $table->foreignId('event_id')
                        ->nullable()
                        ->constrained()
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            $table->foreignId('lodging_id')
                        ->nullable()
                        ->constrained()
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
