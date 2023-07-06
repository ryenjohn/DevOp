<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'start_time',
        'end_time',
        'school_id',

    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function school():BelongsTo{
        return $this->belongsTo(School::class);
    }
}
