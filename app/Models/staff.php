<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;

     protected $fillable = [
        'full_name',
        'date_of_birth',
        'gender',
        'address',
        'national_id',
        'phone_number',
        'email',
        'emergency_contact_name',
        'emergency_contact_phone',
        'position',
        'department',
        'date_of_hire',
        'employment_status',
        'employment_type',
        'shift_schedule',
        'salary',
        'pay_frequency',
        'bank_account',
        'benefits_enrollment',
        'deductions',
        'employment_contract',
        'tax_forms',
        'work_authorization',
        'nda_nca_agreement',
        'highest_education',
        'training_certifications',
        'next_performance_review',
        'goals_objectives',
        'termination_date',
        'termination_reason',
     ];


     public function housekeepingStaff(){

        return $this->hasMany(HousekeepingStaff::class,'staff_id');
     }
}
