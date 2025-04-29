<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceCategories extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'service_categories';    
    public $incrementing = false;
    protected $guarded = [
        
    ];

    public function service()
    {
        return $this->hasMany(Services::class, 'category_id','id');
    }
}
