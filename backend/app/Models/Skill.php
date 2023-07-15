<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
class Skill extends Model
{
    use HasFactory;
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'name',
        'description',
        'image'
    ];
    public static function skill($request, $id = null)
    {
        $skill = $request->only([
            'name',
            'description',
            'image'
        ]);
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $filename = $image->getClientOriginalExtension();
        //     $image->move(public_path('images/skills'), $filename);
        //     $skill['image'] = $filename;
        // }
        $skill = self::updateOrCreate(['id'=>$id], $skill);
        $subjects = request('subjects');
        $skill->subjects()->sync($subjects);
        return $skill;
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'skill_subjects')->withTimestamps();
    }

    public function schools()
    {
        return $this->belongsToMany(School::class, 'school_skills')->withTimestamps();
    }

    public function scholarship(): HasMany
    {
        return $this->hasMany(ScholarShip::class);
    }
}
