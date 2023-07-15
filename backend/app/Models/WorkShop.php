<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class WorkShop extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'address_id',
        'school_id',
        'description',
        'start_date',
        'expired_date',
        'time',

    ];
    public static function workShop($request, $id = null)
    {
        $workShop = $request->only([
            'name',
            'image',
            'address_id',
            'school_id',
            'description',
            'start_date',
            'expired_date',
            'time',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('src/workshops', $filename);
            $workShop['image'] = $filename;
  
        }
        $workShop = self::updateOrCreate(['id' => $id], $workShop);
        return $workShop;
    }
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
