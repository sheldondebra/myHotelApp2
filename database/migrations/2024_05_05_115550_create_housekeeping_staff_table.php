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
        Schema::create('housekeeping_staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_name')->constrained('staff', 'id')->cascadeOnDelete();
            $table->string('task_title')->nullable();
            $table->string('task_description')->nullable();
            $table->date('date_assigned')->nullable();
            $table->date('Estimated_time')->nullable();
            $table->enum('priority',[
                'low',
                'medium',
                'high',
            ]);
            $table->enum('status',[
                'pending',
                'in_progress',
                'completed',
            ])->default('pending');
            $table->foreignId('room_id')->constrained()->cascadeOnDelete();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('housekeeping_staff');
    }
};
