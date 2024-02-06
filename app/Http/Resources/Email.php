<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Email extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' =>$this->id,
            'name' => $this->name,
            'project_name' => $this->project_name,
            'website' => $this->website,
            'facebook' => $this->facebook,
            'youtube' => $this->youtube,
            'twitter' => $this->twitter,
            'linedin' => $this->linedin,
            'instagram' => $this->instagram,
            'pinterest' => $this->pinterest,
            'reddit' => $this->reddit,
            'tiktok' => $this->tiktok,
            'slugname' => $this->slugname,
            'slug_id' => $this->slug_id,

        ];
    }
}
