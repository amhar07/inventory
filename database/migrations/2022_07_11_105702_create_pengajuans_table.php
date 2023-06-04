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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('kodepengajuan', 7);
            $table->string('IDbarang', 3)->nullable();
            $table->string('namapengaju', 30)->nullable();
            $table->string('namabarang', 30)->nullable();
            $table->string('jumlahbarang', 3)->nullable();
            $table->string('status', 6)->nullable();
            $table->date('tanggalpengajuan')->nullable();
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
        Schema::dropIfExists('pengajuans');
    }
};