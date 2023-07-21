<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

<<<<<<< HEAD:backend/app/Http/Resources/UserResource.php
class UserResource extends JsonResource
=======
class WorkshopResource extends JsonResource
>>>>>>> 63b309eb7828f9aca2c49ecd6390f3b56a49defb:backend/app/Http/Resources/workshopResource.php
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
<<<<<<< HEAD:backend/app/Http/Resources/UserResource.php
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $this-> role_id,
=======
            'id'=>$this->id,
            'name'=>$this->name,
            'img'=>$this->img,
            // 'address'=>AddressResource::collection($this->address),
            'address'=>SchoolResource::collection($this->school),
            'description'=>$this->description,
            'start_date'=>$this->description,
            'expired_date'=>$this->description,
            'time'=>$this->description,     
>>>>>>> 63b309eb7828f9aca2c49ecd6390f3b56a49defb:backend/app/Http/Resources/workshopResource.php
        ];

    }
}
