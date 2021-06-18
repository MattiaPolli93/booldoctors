<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Plan_UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /* return parent::toArray($request); */
        return [
            'id' => $this->id,
            'Date' => $this->expire_date
        ];
    }
}
