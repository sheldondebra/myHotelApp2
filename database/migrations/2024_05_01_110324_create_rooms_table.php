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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('roomtypes_id')->constrained()->cascadeOnDelete();
            $table->boolean('available')->default(true);
            $table->enum('status', ['Clean', 'Dirty', 'Inspected'])->default('Dirty');
            $table->timestamp('last_cleaned_at')->nullable();
            $table->timestamp('next_cleaning_at')->nullable();
            $table->text('maintenance_notes')->nullable();
            $table->integer('Occupancy');
            $table->string('Description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
