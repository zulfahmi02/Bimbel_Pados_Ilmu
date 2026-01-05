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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('category', ['sd', 'smp', 'sma', 'all']);
            $table->text('description');
            $table->json('subjects')->nullable(); // Array of subjects
            $table->json('facilities')->nullable(); // Array of facilities
            $table->integer('price');
            $table->string('duration'); // e.g., "2x seminggu"
            $table->integer('max_students')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_premium')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
