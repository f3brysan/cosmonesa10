<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceSlot extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'service_slots';    
    public $incrementing = false;
    protected $guarded = [
        
    ];
}
