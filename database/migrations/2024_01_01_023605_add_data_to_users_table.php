<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('role_id')->unsigned()->nullable();
            $table->bigInteger('jabatan_id')->unsigned()->nullable();
            $table->bigInteger('section_id')->unsigned()->nullable();
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->string('photo')->nullable();
            $table->string('ttd')->nullable();
            $table->string('gender')->nullable();
            $table->string('status_employee')->nullable();
            $table->string('active')->nullable();

            $table->foreign('role_id')->on('roles')->references('id');
            $table->foreign('jabatan_id')->on('jabatan')->references('id');
            $table->foreign('section_id')->on('section')->references('id');
            $table->foreign('department_id')->on('department')->references('id');
            $table->foreign('company_id')->on('company')->references('id');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id');
            $table->dropColumn('jabatan_id');
            $table->dropColumn('section_id');
            $table->dropColumn('department_id');
            $table->dropColumn('company_id');
            $table->dropColumn('photo');
            $table->dropColumn('ttd');
            $table->dropColumn('gender');
            $table->dropColumn('status_employee');
            $table->dropColumn('active');
        });
    }
};