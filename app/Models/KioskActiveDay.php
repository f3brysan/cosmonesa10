<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KioskActiveDay extends Model
{
    use HasFactory;
    protected $table = 'kiosk_active_days';    
    public $incrementing = false;
    protected $guarded = [
        
    ];
}
