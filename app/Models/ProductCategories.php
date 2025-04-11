<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategories extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'product_categories';    
    public $incrementing = false;
    protected $guarded = [
        
    ];

    public function product()
    {
        return $this->hasMany(Products::class, 'category_id','id');
    }
}
