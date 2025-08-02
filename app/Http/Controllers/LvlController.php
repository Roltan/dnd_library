<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LvlController extends Controller
{
    public function info()
    {
        return response()->json([
            'status' => true,
            'table' => config('app.lvlTable')
        ]);
    }
}
