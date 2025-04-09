<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImages extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'product_images';    
    public $incrementing = false;
    protected $guarded = [
        
    ];
}
