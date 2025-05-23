<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceBooking extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'service_bookings';    
    public $incrementing = false;
    protected $guarded = [
        
    ];

    public function service()
    {
        return $this->belongsTo(Services::class);
    }

    public function slot()
    {
        return $this->belongsTo(ServiceSlot::class);
    }
}
