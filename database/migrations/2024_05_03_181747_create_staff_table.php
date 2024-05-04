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
        Schema::create('staff', function (Blueprint $table) {
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('gender')->nullable();
            $table->string('address');
            $table->string('national_id')->unique();
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_phone');
            $table->string('position');
            $table->string('department');
            $table->date('date_of_hire');
            $table->enum('employment_status', ['full-time', 'part-time', 'contract']);
            $table->enum('employment_type', ['permanent', 'temporary', 'seasonal']);
            $table->string('shift_schedule')->nullable();
            $table->decimal('salary', 10, 2);
            $table->enum('pay_frequency', ['weekly', 'bi-weekly', 'monthly']);
            $table->string('bank_account')->nullable();
            $table->string('benefits_enrollment')->nullable();
            $table->string('deductions')->nullable();
            $table->string('employment_contract')->nullable();
            $table->string('tax_forms')->nullable();
            $table->string('work_authorization')->nullable();
            $table->string('nda_nca_agreement')->nullable();
            $table->string('highest_education')->nullable();
            $table->string('training_certifications')->nullable();
            $table->date('next_performance_review')->nullable();
            $table->text('goals_objectives')->nullable();
            $table->date('termination_date')->nullable();
            $table->string('termination_reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
