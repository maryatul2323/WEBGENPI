<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplyOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supply_outlets', function (Blueprint $table) {
            $table->id();
            $table->char('code', 8)->unique();
            $table->foreignId('souvenir_id')
                        ->constrained()
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            $table->foreignId('shop_id')
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
        Schema::dropIfExists('supply_outlets');
    }
}
