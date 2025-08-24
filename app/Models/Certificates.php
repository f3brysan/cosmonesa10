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
    
    protected $guarded = [];
    

    public function participant()
    {
        return $this->hasOne(EventParticipants::class, 'id', 'event_participant_id');
    }   
}
