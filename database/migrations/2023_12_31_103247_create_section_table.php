<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('section', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->bigInteger('department_id')->unsigned();
            $table->timestamps();

            $table->foreign('department_id')->on('department')->references('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('section');
    }
};