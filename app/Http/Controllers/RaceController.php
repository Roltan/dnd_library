<?php

namespace App\Http\Controllers;

use App\Http\Resources\Race\ChoiceInfoResource;
use App\Http\Resources\Race\StaticInfoResource;
use App\Models\Race;
use App\Repositories\RaceRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RaceController extends Controller
{
    public function getList(): Response
    {
        $race = Race::query()
            ->with('subRace')
            ->get(['id', 'name'])
            ->map(fn($model) => [
                'name' => $model->name,
                'sub' => $model->subRace->pluck('name')
            ]);
        return response(['status' => true, 'races' => $race]);
    }

    public function getStaticInfo($race): Response
    {
        $race = RaceRepository::getRace($race);
        $race = new StaticInfoResource($race);

        return response(['status' => true, 'info' => $race]);
    }

    public function getChoiceInfo($race): Response
    {
        $race = RaceRepository::getRace($race);
        $race = new ChoiceInfoResource($race);

        return response(['status' => true, 'info' => $race]);
    }
}
