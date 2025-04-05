<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workshops extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'workshops';    
    public $incrementing = false;
    protected $guarded = [
        
    ];
}