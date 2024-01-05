<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('device_id')->unsigned()->nullable();
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->bigInteger('caller_id')->unsigned()->nullable();
            $table->bigInteger('pic_id')->unsigned()->nullable();
            $table->bigInteger('equipment_id')->unsigned()->nullable();
            $table->dateTime('call_at')->nullable();
            $table->dateTime('response_at')->nullable();
            $table->dateTime('closed_at')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('device_id')->on('device')->references('id');
            $table->foreign('department_id')->on('department')->references('id');
            $table->foreign('caller_id')->on('users')->references('id');
            $table->foreign('pic_id')->on('users')->references('id');
            $table->foreign('equipment_id')->on('equipment')->references('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};