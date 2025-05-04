<?php

namespace App\Http\Resources\Klass;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpellResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'scripts' => $this->scripts,
            'description' => $this->description,
            'distance' => $this->distance,
            'time_cast' => $this->time_cast,
            'duration' => $this->duration,
            'need_concentration' => $this->need_concentration,
            'need_verbal' => $this->need_verbal,
            'need_semant' => $this->need_semant,
            'need_material' => $this->need_material,
            'materials' => $this->materials,
            'lvl' => $this->lvl,
            'can_lower_lvl' => $this->can_lower_lvl
        ];
    }
}
