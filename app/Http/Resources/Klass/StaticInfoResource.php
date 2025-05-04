<?php

namespace App\Http\Resources\Klass;

use App\Repositories\AbilityRepository;
use App\Repositories\KlassRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class StaticInfoResource extends JsonResource
{
    private $lvl;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = $this->getBase();
        $this->lvl = $request->input('lvl', 1);

        $data['prof'] = $this->getProf();
        $data['skills'] = $this->getSkill($this);
        $data['units'] = $this->getUnit($this);

        if ($request->has('subKlass')) {
            $sub = KlassRepository::getSubKlass($request->subKlass, $this->name);
            $data['skills'] += $this->getSkill($sub);
            $data['units'] += $this->getUnit($sub);
        }

        return $data;
    }

    private function getBase(): array
    {
        return [
            'dice_hp' => $this->dice_hp,
            'save_stat' => AbilityRepository::getNameById($this->save_stat),
            'sub_klass_lvl' => $this->sub_klass_lvl,
            'abilities_spell' => AbilityRepository::getNameById($this->abilities_spell),
        ];
    }

    private function getProf(): array
    {
        return $this->proficiencies()
            ->get()
            ->pluck('name')
            ->toArray();
    }

    private function getSkill(object $object): array
    {
        return $object->skills()
            ->where('lvl', '<=', $this->lvl)
            ->get()
            ->pluck('id')
            ->toArray();
    }

    private function getUnit(object $object): array
    {
        return $object->units()
            ->where('lvl', '<=', $this->lvl)
            ->where('value', '>=', 1)
            ->select('name', DB::raw('MAX(value) as value'))
            ->groupBy('name')
            ->get(['name', 'value'])
            ->toArray();
    }
}
