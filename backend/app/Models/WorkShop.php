<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkShop extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'img',
        'description',
        'start_date',
        'expired_date',
        'time',
        'school_id',
        'address_id',

    ];

    public function user():HasMany{
        return $this->hasMany(User::class);
    }

    public function school():BelongsTo{
        return $this->belongsTo(School::class);
    }
    public function address():BelongsTo{
        return $this->belongsTo(Address::class);
    }
}
