<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id'=>$this->id,
            'category_id'=>$this->category_id,
            'title'=> $this->title,
            'description' => $this->description,
            'active'=>$this->active,
            'time_limit'=>$this->time_limit,
            'has_correct_answers'=>$this->has_correct_answers,
            'randomize'=>$this->randomize,
            'score'=>$this->score,
            'visibility' => $this->visibility,
        ];
    }
}
