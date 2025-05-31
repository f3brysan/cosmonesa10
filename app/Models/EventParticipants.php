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
    protected $fillable = [
        'user_id',
        'event_id',
        'transaction_id',
    ];
    public function certificate(): HasOne
    {
        return $this->hasOne(Certificates::class, 'event_participant_id', 'id');
    }
    public function events(): BelongsTo
    {
        return $this->belongsTo(Events::class, 'event_id', 'id');
    }
    public function participants(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
