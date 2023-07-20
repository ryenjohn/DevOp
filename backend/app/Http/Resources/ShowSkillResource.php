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
