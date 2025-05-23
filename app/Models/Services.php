<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Services extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'services';    
    public $incrementing = false;
    protected $guarded = [
        
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategories::class, 'category_id');
    }

    public function kiosk() 
    {
        return $this->belongsTo(Kiosks::class, 'kiosk_id');
    }
}
