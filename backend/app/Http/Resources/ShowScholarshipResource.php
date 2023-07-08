<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowScholarshipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'img'=>$this->img,
            'description'=>$this->description,
            'post_date'=>$this->post_date,
            'expired_date'=>$this->expired_date,
            'school'=>$this->school->name,
            'skill'=>$this->skill->name
        ];
    }
}
