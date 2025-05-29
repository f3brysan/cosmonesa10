<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'cart_items';    
    public $incrementing = false;
    protected $guarded = [
        
    ];
}
