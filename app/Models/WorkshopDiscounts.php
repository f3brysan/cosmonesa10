<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkshopDiscounts extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'workshop_discounts';    
    public $incrementing = false;
    protected $guarded = [
        
    ];
}
