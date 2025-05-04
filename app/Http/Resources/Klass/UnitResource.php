<?php

namespace App\Http\Resources\Klass;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
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
            'lvl' => $this->lvl,
            'value' => $this->value,
            'is_resources' => $this->is_resources,
            'reset_short_rest' => $this->reset_short_rest,
            'reset_initiative' => $this->reset_initiative
        ];
    }
}
