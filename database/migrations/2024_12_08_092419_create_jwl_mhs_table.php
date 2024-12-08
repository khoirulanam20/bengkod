<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jwl_mhs', function (Blueprint $table) {
            $table->id();
            $table->integer('mhs_id');
            $table->string('matakuliah', 255);
            $table->integer('sks');
            $table->string('kelp', 50);
            $table->string('ruangan', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jwl_mhs');
    }
};