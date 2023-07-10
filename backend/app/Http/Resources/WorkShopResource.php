<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkShopResource extends JsonResource
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
            'work_shop' => $this->name,
            'image' => $this->image,
            'start_date' => $this->start_date,
            'expired_date' => $this->expired_date,
            'time' => $this->time,
            'school_id' => $this->school_id
        ];
    }
}
