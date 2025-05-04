<?php

namespace App\Http\Resources\Race;

use App\Repositories\RaceRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaticInfoResource extends JsonResource
{
    private $lvl;

    public function toArray(Request $request): array
    {
        $data = [
            'speed' => $this->speed,
            'size' => $this->size,
            'height' => $this->height,
            'weight' => $this->weight
        ];

        $this->lvl = $request->input('lvl', 1);

        $data['skills'] = $this->getSkill($this);

        if ($request->has('subRace')) {
            $sub = RaceRepository::getSubRace($request->subRace);
            $data['skills'] += $this->getSkill($sub);
        }

        return $data;
    }

    private function getSkill(object $object): array
    {
        return $object->skills()
            ->where('lvl', '<=', $this->lvl)
            ->get()
            ->pluck('name')
            ->toArray();
    }
}
