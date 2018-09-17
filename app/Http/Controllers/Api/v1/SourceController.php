<?php

namespace App\Http\Controllers\Api\v1;

use App\Entity\Source;
use App\Http\Controllers\Controller;
use App\Http\Resources\SourceResource;

/**
 * Class SourceController
 * @package App\Http\Controllers\Api\v1
 */
class SourceController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return SourceResource::collection(Source::all());
    }
}