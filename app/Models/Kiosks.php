<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kiosks extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'kiosks';
    public $incrementing = false;
    protected $guarded = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->hasMany(Services::class, 'kiosk_id', 'id');
    }
}
