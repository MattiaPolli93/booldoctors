<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;



class UserResource extends JsonResource
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
            'name' => $this->name,
            'sruname' => $this->surname,
            'email' => $this->email,
            'details' => new DetailResource($this->details),
            'specializations' => SpecializationResource::collection($this->specializations),
            'rate' => CommentResource::collection($this->comments)
        ];
    }
}
