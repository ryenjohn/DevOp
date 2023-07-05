<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ScholarShip extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'post_date',
        'expired_date',
        'school_id',
        'skill_id',

    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function skill():BelongsTo{
        return $this->belongsTo(Skill::class);
    }

    public function school():BelongsTo{
        return $this->belongsTo(School::class);
    }

    public function users():HasMany{
        return $this->hasMany(User::class);
    }
}
