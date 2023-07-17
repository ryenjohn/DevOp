<?php

namespace App\Http\Resources;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowSchoolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'address' => $this->address->link,
            'type' => $this->type->name,
            'skills' => SkillResource::collection($this->skills),
            'workshops' => $this->workshop,
            'scholarship' => ShowScholarshipResource::collection($this->scholarship)
        ];
    }
}
