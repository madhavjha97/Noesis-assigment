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
        Schema::create('telephone_directories_views', function (Blueprint $table) {
            $table->id();

            $table->foreignId('telephone_directory_id') // Foreign key column
            ->constrained('telephonedirectories') // Reference table
            ->onDelete('cascade'); // If contact is deleted, delete views too
            $table->timestamp('viewed_at')->useCurrent(); // Default to current timestamp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telephone_directories_views');
    }
};
