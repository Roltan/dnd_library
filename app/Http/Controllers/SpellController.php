<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdsRequest;
use App\Http\Resources\Klass\SpellResource;
use App\Models\Spell;
use App\Repositories\SpellRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SpellController extends Controller
{
    public function getInfo(IdsRequest $request): Response
    {
        $id = $request->id;
        if (is_array($id)) {
            $spell = SpellRepository::getManyInfo($id);
            $spell = SpellResource::collection($spell);
            return response(['status' => true, 'spells' => $spell]);
        } else {
            $spell = Spell::find($id);
            $spell = new SpellResource($spell);
            return response(['status' => true, 'spell' => $spell]);
        }
    }
}
