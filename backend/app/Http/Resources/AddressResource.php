<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
<<<<<<< HEAD
        return [
            'id'=>$this->id,
            'city_province' => $this->{'city/province'},
            'street'=>$this->street,
            'location' => $this->location,
            'link' => $this->link
        ];
=======
        return parent::toArray($request);
>>>>>>> 63b309eb7828f9aca2c49ecd6390f3b56a49defb
    }
}
