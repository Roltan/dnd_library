<?php

namespace App\Http\Resources\Klass;

use App\Repositories\KlassRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChoiceInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'ability' => $this->abilities()
                ->get()
                ->pluck('name'),
            'abilities_count' => $this->abilities_count,
            'money' => $this->money,
            'equipment' => $this->equipment,
        ];

        $data['spell'] = KlassRepository::getAvailableSpells(
            $this->name,
            $request->input('subKlass', ''),
            $request->input('lvl', 1)
        );

        return $data;
    }
}
