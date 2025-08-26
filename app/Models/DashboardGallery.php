<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardGallery extends Model
{
    use HasFactory;
    protected $table = 'dashboard_gallery';
    protected $fillable = [
        'name',
        'path',
    ];
    public $timestamps = false;
}
