<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
        $rates = $this->comments()->get('rate');
        /* dd($rates[0]->rate); */
        if (count($rates) > 0) {
            $rateSum = 0;
            for ($i = 0; $i < count($rates); $i++) {
                $rateSum = $rateSum + $rates[$i]->rate;
            }
            $averageRate = $rateSum / count($rates);
        } else {
            $averageRate = 0;
        }
        /* dd(intval($averageRate)); */
        return [
            /* 'id' => $this->id, */
            /* 'rate' => $this->rate */
            'ratesTotal' => count($rates),
            'averageRate' => intval($averageRate)
        ];
    }
}
