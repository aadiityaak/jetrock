<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('no_hp')->nullable();
                $table->string('id_karyawan')->nullable();
                $table->string('alamat')->nullable();
                $table->date('tanggal_masuk')->nullable();
                $table->string('role')->default('user');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn(['no_hp', 'id_karyawan', 'alamat', 'tanggal_masuk', 'role']);
            });
        });
    }
};
