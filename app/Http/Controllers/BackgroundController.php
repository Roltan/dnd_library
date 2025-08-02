<?php

namespace App\Http\Controllers;

use App\Http\Resources\Background\ChoiceResource;
use App\Http\Resources\Background\StaticResource;
use App\Models\Background;
use App\Repositories\BackgroundRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BackgroundController extends Controller
{
    public function getList(): Response
    {
        $backgrounds = Background::query()
            ->get()
            ->pluck('name');

        return response(['status' => true, 'backgrounds' => $backgrounds]);
    }

    public function getStaticInfo($background): Response
    {
        $background = BackgroundRepository::getBackground($background);
        $background = new StaticResource($background);

        return response(['status' => true, 'info' => $background]);
    }

    public function getChoiceInfo($background): Response
    {
        $background = BackgroundRepository::getBackground($background);
        $background = new ChoiceResource($background);

        return response(['status' => true, 'info' => $background]);
    }
}
