<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;
    protected $fillable=[
        'street',
        'city'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
    public function school():BelongsTo{
        return $this->belongsTo(School::class);
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

}
