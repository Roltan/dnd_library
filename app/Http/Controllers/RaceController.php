<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RaceController extends Controller
{
    public function getList(): Response
    {
        $race = Race::query()
            ->get()
            ->map(fn($model) => [
                'name' => $model->name,
                'sub' => $model->subRace()
                    ->get()
                    ->pluck('name')
            ]);

        return response(['status' => true, 'races' => $race]);
    }
}
