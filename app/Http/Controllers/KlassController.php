<?php

namespace App\Http\Controllers;

use App\Http\Resources\Klass\ChoiceInfoResource;
use App\Http\Resources\Klass\StaticInfoResource;
use App\Models\Klass;
use App\Models\SubKlass;
use App\Repositories\KlassRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class KlassController extends Controller
{
    public function getList(): Response
    {
        $klass = Klass::query()
            ->get()
            ->pluck('name');

        return response(['status' => true, 'klasses' => $klass]);
    }

    public function getSubKlass($klass): Response
    {
        $klass = KlassRepository::getKlass($klass);

        $subKlass = $klass->subKlass()
            ->get()
            ->pluck('name');

        return response(['status' => true, 'subKlasses' => $subKlass]);
    }

    public function getStaticInfo($klass): Response
    {
        $klass = KlassRepository::getKlass($klass);
        $klass = new StaticInfoResource($klass);

        return response(['status' => true, 'info' => $klass]);
    }

    public function getChoiceInfo($klass): Response
    {
        $klass = KlassRepository::getKlass($klass);
        $klass = new ChoiceInfoResource($klass);

        return response(['status' => true, 'info' => $klass]);
    }
}
