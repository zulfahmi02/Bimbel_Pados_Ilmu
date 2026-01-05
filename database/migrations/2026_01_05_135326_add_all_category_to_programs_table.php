<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Modify ENUM to add 'all' category
        DB::statement("ALTER TABLE programs MODIFY COLUMN category ENUM('sd', 'smp', 'sma', 'all') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert ENUM to original values (remove 'all')
        // Note: This will fail if any records have category = 'all'
        DB::statement("ALTER TABLE programs MODIFY COLUMN category ENUM('sd', 'smp', 'sma') NOT NULL");
    }
};
