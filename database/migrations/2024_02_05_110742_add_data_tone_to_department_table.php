<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('department', function (Blueprint $table) {
            $table->string('call_tone')->nullable();
            $table->string('response_tone')->nullable();
            $table->string('closed_tone')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('department', function (Blueprint $table) {
            $table->dropColumn('call_tone');
            $table->dropColumn('response_tone');
            $table->dropColumn('closed_tone');
        });
    }
};