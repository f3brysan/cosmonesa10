<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardProfile extends Model
{
    use HasFactory;
    protected $table = 'dashboard_profile';
    public $timestamps = false;
}
