<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventTypes extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'event_types';    
    public $incrementing = false;
    protected $guarded = [
        
    ];
}
