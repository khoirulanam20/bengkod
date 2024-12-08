<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('inputmhs', function (Blueprint $table) {
            $table->id();
            $table->string('namaMhs', 255);
            $table->string('nim', 15);
            $table->float('ipk');
            $table->integer('sks');
            $table->text('matakuliah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inputmhs');
    }
};