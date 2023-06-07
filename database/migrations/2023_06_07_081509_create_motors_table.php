<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->foreign('kendaraan_id')->references('id')->on('kendaraans');
            $table->string('mesin');
            $table->enum('tipe_suspensi',['teleskopik','double shockbreaker']);
            $table->enum('tipe_transmisi',['manual','matic']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('motors');
    }
}
