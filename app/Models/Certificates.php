<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpParser\Node\Expr\FuncCall;

class Certificates extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'certificates';
    public $incrementing = false;    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */    
    protected $guarded = [];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'issued_at' => 'date',
        'valid_until' => 'date',
    ];

    private function event(): BelongsTo
    {
        return $this->belongsTo(EventParticipants::class, 'event_participant_id', 'id');
    }
    public function holder()
    {
        return $this->event()->user_id();
    }
}
