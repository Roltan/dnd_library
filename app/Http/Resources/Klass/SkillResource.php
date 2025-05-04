<?php

namespace App\Http\Resources\Klass;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
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
            'description' => $this->description,
            'lvl' => $this->lvl,
            'script' => $this->script,
            'set_price' => $this->set_price
        ];
    }
}
