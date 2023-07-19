<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowSkillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return [
            // 'id' => $this->id,
            // 'name' => $this->name,
            // 'description' => $this->description,
            // 'media_id' => $this->media_id,
            // 'subjects' => SubjectResource::collection($this->subjects),
            // "schools" => SchoolResource::collection($this->schools)
            return $this->only('id',
            'name',
            'description',
            'subjects',
            )
             + [
                "image" => $this->media->file_url ?? null,
            ];
        // ];
    }
}
