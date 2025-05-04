<?php

namespace App\Http\Controllers;

use App\Models\Klass;
use App\Models\SubKlass;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $klass = Klass::query()
            ->where('name', $klass)
            ->first();
        if ($klass === null)
            return response(['status' => false, 'message' => 'klass not found'], 404);

        $subKlass = $klass->subKlass()
            ->get()
            ->pluck('name');

        return response(['status' => true, 'subKlasses' => $subKlass]);
    }
}
