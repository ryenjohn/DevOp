<?php

namespace App\Http\Resources;

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
        return[
            'id'=>$this->id,
            'name'=>$this->name,
            'img'=>$this->img,
            'address'=>$this->address,
            'type'=>$this->type->name,
            'workshops'=>$this->workshop,
            'scholarship'=>ShowScholarshipResource::collection($this->scholarship)
        ];
    }
}
