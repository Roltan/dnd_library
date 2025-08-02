<?php

namespace App\Http\Resources\Background;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'proficiencies' => $this->proficiencies()
                ->get()
                ->pluck('name'),
            'abilities' => $this->abilities()
                ->get()
                ->pluck('name'),
            'skill' => [
                'name' => $this->skill_title,
                'description' => $this->skill_description
            ]
        ];
    }
}
