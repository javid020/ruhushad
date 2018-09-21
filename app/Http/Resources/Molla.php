<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Molla extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $date = date('d-m-Y', strtotime($this->birth_day));

        return [
            'id' => $this->id,
            'name' => $this->fullname,
            'email' => $this->email,
            'phone1' => $this->phone,
            'phone2' => $this->phone1,
            'about' => $this->about,
            'gender' => $this->gender,
            'birth_date' => $date,
            'belief' => $this->belief->name,
            'experience' => $this->experience . ' years',
        ];
    }
}
