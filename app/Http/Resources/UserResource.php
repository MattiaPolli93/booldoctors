<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
        if ($this->plans()->get()->last()) {
                $Date = ['expire_date' => $this->plans()->get()->last()->pivot->expire_date];
        } else {
            $Date = Carbon::now('Europe/Rome')->subDay()->format('Y-m-d H:m:s');
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'details' => new DetailResource($this->details),
            'specializations' => SpecializationResource::collection($this->specializations),
            'rate' => CommentResource::collection($this->comments),
            'expire_date' => $Date
        ];
    }
}
