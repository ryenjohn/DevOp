<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
class School extends Model
{
    use HasFactory;
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable=[
        'name',
        'image',
        'type_education_id',
        'address_id',

    ];
    public static function school($request, $id=null){
        $school = $request->only(['name','image', 'type_education_id', 'address_id']);
        if (filled($request->image)) {
            $path = $request->file('image')->store('public/images/schools');
            // Get the file's public URL
            $url = Storage::url($path);
            if($url){
                $school['image']=$url;
            }
        }
        $school = self::updateOrCreate(['id'=>$id], $school);
        $skills = request('skills');
        $school->skills()->sync($skills);
        return $school;
    }
  
    public function scholarship():HasMany{
        return $this->hasMany(ScholarShip::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'school_skills')->withTimestamps();
    }

    public function schedule(): HasMany
    {
        return $this->hasMany(schedule::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(TypeEducation::class, "type_education_id", "id");
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function workshops(): HasMany
    {
        return $this->hasMany(WorkShop::class);
    }
}
