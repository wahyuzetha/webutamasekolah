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
        Schema::table('teachers', function (Blueprint $table) {
            $table->string('slug')->unique()->after('name')->nullable();
            $table->string('nuptk')->nullable()->after('position');
            $table->string('nip')->nullable()->after('nuptk');
            $table->string('tempat_lahir')->nullable()->after('nip');
            $table->string('agama')->nullable()->after('tempat_lahir');
            $table->string('jenis_kelamin')->nullable()->after('agama');
            $table->string('status_pegawai')->nullable()->after('jenis_kelamin');
            $table->string('phone')->nullable()->after('status_pegawai');
            $table->string('email')->nullable()->after('phone');
            $table->text('alamat')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn([
                'slug',
                'nuptk',
                'nip',
                'tempat_lahir',
                'agama',
                'jenis_kelamin',
                'status_pegawai',
                'phone',
                'email',
                'alamat'
            ]);
        });
    }
};
