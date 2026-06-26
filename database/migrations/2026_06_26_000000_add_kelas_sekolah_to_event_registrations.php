<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('event_registrations', function (Blueprint $table) {
            if (!Schema::hasColumn('event_registrations', 'kelas')) {
                $table->string('kelas')->after('address');
            }
            if (!Schema::hasColumn('event_registrations', 'sekolah')) {
                $table->string('sekolah')->after('kelas');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_registrations', function (Blueprint $table) {
            if (Schema::hasColumn('event_registrations', 'sekolah')) {
                $table->dropColumn('sekolah');
            }
            if (Schema::hasColumn('event_registrations', 'kelas')) {
                $table->dropColumn('kelas');
            }
        });
    }
};
