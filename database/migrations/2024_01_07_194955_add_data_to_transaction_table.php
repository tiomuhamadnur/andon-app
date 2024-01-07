<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transaction', function (Blueprint $table) {
            $table->string('ticket_number')->unique()->nullable()->before('device_id');
            $table->string('photo')->nullable();
            $table->string('photo_closed')->nullable();
            $table->string('remark')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('transaction', function (Blueprint $table) {
            $table->dropColumn('ticket_number');
            $table->dropColumn('photo');
            $table->dropColumn('photo_closed');
            $table->dropColumn('remark');
        });
    }
};