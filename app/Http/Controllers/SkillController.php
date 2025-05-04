<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdsRequest;
use App\Http\Resources\Klass\SkillResource;
use App\Models\Skill;
use App\Repositories\SkillRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SkillController extends Controller
{
    public function getInfo(IdsRequest $request): Response
    {
        $id = $request->id;
        if (is_array($id)) {
            $skill = SkillRepository::getManyInfo($id);
            $skill = SkillResource::collection($skill);
            return response(['status' => true, 'skills' => $skill]);
        } else {
            $skill = Skill::find($id);
            $skill = new SkillResource($skill);
            return response(['status' => true, 'skill' => $skill]);
        }
    }
}
