<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouvenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souvenirs', function (Blueprint $table) {
            $table->id();
            $table->char('code', 8)->unique();
            $table->string('title');
            $table->string('slug')->unique();
            $table->set('type', ['Kuliner', 'Cendramata']);
            $table->integer('price_starting_from');
            $table->text('description');
            $table->string('main_image');
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
        Schema::dropIfExists('souvenirs');
    }
}
