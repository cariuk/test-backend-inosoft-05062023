<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->foreign('kendaraan_id')->references('id')->on('kendaraans');
            $table->enum('mesin', ['1200cc', '1500cc', '1800cc', '2000cc']);
            $table->enum('kapasitas_penumpang', ['4', '6', '8', '10']);
            $table->enum('tipe', ['sedan', 'mpv', 'suv', 'hatchback', 'sport']);
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
        Schema::dropIfExists('mobils');
    }
}
