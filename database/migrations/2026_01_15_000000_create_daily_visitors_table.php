<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('daily_visitors', function (Blueprint $table) {
            $table->id();
            $table->date('visited_on')->index();
            $table->uuid('visitor_id');
            $table->timestamp('first_seen_at');
            $table->timestamps();

            $table->unique(['visited_on', 'visitor_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daily_visitors');
    }
};
