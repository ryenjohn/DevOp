<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function subjects():BelongsToMany{
        return $this->belongsToMany(Subjects::class,'skill_subject','skill_id','subject_id');
    }
    public function schools():BelongsToMany{
        return $this->belongsToMany(School::class);
    }
    
    public function scholarship():HasMany{
        return $this->hasMany(ScholarShip::class);
    } 
    
  
}
