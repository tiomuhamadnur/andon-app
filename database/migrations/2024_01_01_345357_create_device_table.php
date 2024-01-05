<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('device', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('token')->unique();
            $table->bigInteger('building_id')->unsigned()->nullable();
            $table->bigInteger('zona_id')->unsigned()->nullable();
            $table->bigInteger('line_id')->unsigned()->nullable();
            $table->bigInteger('process_id')->unsigned()->nullable();
            $table->bigInteger('section_id')->unsigned()->nullable();
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('building_id')->on('building')->references('id');
            $table->foreign('zona_id')->on('zona')->references('id');
            $table->foreign('line_id')->on('line')->references('id');
            $table->foreign('process_id')->on('process')->references('id');
            $table->foreign('section_id')->on('section')->references('id');
            $table->foreign('department_id')->on('department')->references('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('device');
    }
};