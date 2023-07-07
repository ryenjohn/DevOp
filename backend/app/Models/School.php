<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'img',
        'type_education_id',
        'address_id',

    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function scholarship():HasMany{
        return $this->hasMany(ScholarShip::class);
    }

    public function skills():BelongsToMany{
        return $this->belongsToMany(Skill::class,'school_skill','skill_id','school_id');
    }

    public function schedule():HasMany{
        return $this->hasMany(schedule::class);
    }
    
    public function type():BelongsTo{
        return $this->belongsTo(TypeEducation::class,"type_education_id","id");
    }

    public function address():BelongsTo{
        return $this->belongsTo(Address::class);
    }

    public function comment():HasMany{
        return $this->hasMany(Comment::class);
    }

    public function workshop():HasMany{
        return $this->hasMany(WorkShop::class);
    }
    
}
