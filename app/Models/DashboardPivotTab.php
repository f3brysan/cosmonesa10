<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardPivotTab extends Model
{
    use HasFactory;
    protected $table = 'profile_gallery_section';
    public $timestamps = false;
    protected $fillable = [
        'profile_id',
        'gallery_id',
    ];
}
