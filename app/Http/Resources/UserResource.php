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
                $Date = $this->plans()->get()->last()->pivot->expire_date;
        } else {
            $Date = Carbon::now('Europe/Rome')->subDay()->format('Y-m-d H:m:s');
        }
       /*  $rates = $this->comments()->get('rate');
        dd($rates[0]->rate);
        if (count($rates)>0) {
            $rateSum = 0;
            for ($i=0; $i < count($rates); $i++) {
                $rateSum = $rateSum + $rates[$i]->rate;
            }
            $averageRate = $rateSum / count($rates);
            
        } else {
            $averageRate = 0;
        }
        dd(intval($averageRate)); */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'details' => new DetailResource($this->details),
            'specializations' => SpecializationResource::collection($this->specializations),
            /* 'rate' => CommentResource::collection($this->comments), */
            'RateInfo' => new CommentResource($this),
            'expire_date' => $Date
        ];
    }
}
