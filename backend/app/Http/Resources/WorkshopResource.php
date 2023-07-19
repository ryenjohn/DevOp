<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkshopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'img'=>$this->img,
            // 'address'=>AddressResource::collection($this->address),
            'address'=>SchoolResource::collection($this->school),
            'description'=>$this->description,
            'start_date'=>$this->description,
            'expired_date'=>$this->description,
            'time'=>$this->description,     
        ];

    }
}
