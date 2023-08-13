<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MarkResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'class_id' => $this->class_id,
            'first_term' => $this->first_term,
            'mid_term' => $this->mid_term,
            'final_term' => $this->final_term,
        ];
    }
}
