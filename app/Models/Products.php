<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'products';    
    public $incrementing = false;
    protected $guarded = [
        
    ];

    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id','id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategories::class,'category_id','id');
    }
}
