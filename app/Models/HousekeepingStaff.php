<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousekeepingStaff extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_name',
        'task_title',
        'task_description',
        'date_assigned',
        'estimated_time',
        'priority',
        'status',
        'room_id',
        'remarks',
    ];

      public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_name');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}


