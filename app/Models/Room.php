<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'roomtype_id',
        'available',
        'occupancy',
        'description',

    ];

    public function roomtype()
    {
        return $this->belongsTo(RoomType::class);
    }
}
