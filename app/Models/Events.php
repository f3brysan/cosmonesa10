<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Events extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'events';
    public $incrementing = false;
    protected $guarded = [];

    public function eventtype()
    {
        return $this->belongsTo(EventTypes::class, 'event_type_id');
    }
    public function participants()
    {
        return User::query()
            ->join('event_participants', 'users.id', '=', 'event_participants.user_id')
            ->where('event_participants.event_id', $this->id);
    }
}
