<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Core\MediaLib;
use Illuminate\Support\Facades\Storage;

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
        // if (filled($request->image)) {
        //     $path = $request->file('image')->store('public/images/skills');
        //     // Get the file's public URL
        //     $url = Storage::url($path);
        //     if($url){
        //         $skill['image']=$url;
        //     }
        // }
        $skill = self::updateOrCreate(['id'=>$id], $skill);
        $subjects = request('subjects');
        $skill->subjects()->sync($subjects);
        return $skill;
    }
    public static function image($request)
    {
        $skill = $request->only([
            'image'
        ]);
        if (filled($request->image)) {
            $path = $request->file('image')->store('public/images/skills');
            // Get the file's public URL
            $url = Storage::url($path);
            if($url){
                return $skill['image']=$url;
            }
        }
        return "Image cannot not add";
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
