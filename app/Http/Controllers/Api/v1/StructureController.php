<?php

namespace App\Http\Controllers\Api\v1;

use App\Entity\Structure;
use App\Http\Controllers\Controller;
use App\Http\Requests\StructureRequest;
use App\Http\Resources\StructureResource;

/**
 * Class StructureController
 * @package App\Http\Controllers\Api\v1
 */
class StructureController extends Controller
{
    /**
     * @param StructureRequest $request
     * @return array
     */
    public function show(StructureRequest $request)
    {
        $name = $request->get('name');

        $structure = Structure::query()
            ->where('name', '=', $name)
            ->first();

        return $structure ? $structure->dataAsArray() : [];
    }
}