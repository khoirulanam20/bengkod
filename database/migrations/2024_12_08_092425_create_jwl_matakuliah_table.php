<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jwl_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->string('matakuliah', 250);
            $table->integer('sks');
            $table->string('kelp', 10);
            $table->string('ruangan', 5);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jwl_matakuliah');
    }
};