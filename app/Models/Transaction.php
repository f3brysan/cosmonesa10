<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'transactions';    
    public $incrementing = false;
    protected $guarded = [
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function transaction_detail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
