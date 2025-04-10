<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Events extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'events';    
    public $incrementing = false;
    protected $guarded = [
        
    ];

    public function eventtype()
    {
        return $this->belongsTo(EventTypes::class, 'event_type_id');
    }
}
