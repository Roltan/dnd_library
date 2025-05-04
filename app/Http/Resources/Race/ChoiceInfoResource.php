<?php

namespace App\Http\Resources\Race;

use App\Repositories\RaceRepository;
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
            'lang' => $this->lang,
            'ideology' => $this->ideology,
            'abilities_bonus' => $this->abilities_bonus
        ];

        if ($request->has('subRace')) {
            $sub = RaceRepository::getSubRace($request->subRace, $this->name);
            $data['lang'] = array_merge($data['lang'], $sub->lang);
            $data['abilities_bonus'] += $sub->abilities_bonus;
        }

        return $data;
    }
}
