<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable = [
        'guests_id',
        'guests_name',
        'check_in_date',
        'check_out_date',
        'room_id',
        'services_id',
        'total_amount'
    ];

    public function guests()
    {
        return $this->belongsTo(Guest::class, 'first_name');
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function services()
    {
        return $this->belongsTo(Service::class);
    }


}
