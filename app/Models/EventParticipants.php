<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EventParticipants extends Pivot
{
    use HasFactory;
    use HasUuids;
    protected $table = 'event_participants';
    public $incrementing = false;
    protected $guarded = [

    ];

    public function events()
    {
        return $this->belongsTo(Events::class, 'event_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
