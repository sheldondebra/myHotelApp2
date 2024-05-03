<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $fillables = [
        'guests_name',
        'check_in_date',
        'check_out_date',
        'room_id',
        'services_id',
        'total_amount'
    ];

    public function guests(){
        return $this->belongsTo(Guest::class,'first_name');
    }
}
