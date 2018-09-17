<?php

namespace App\Http\Controllers\Api\v1;

use App\Entity\Data;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataRequest;
use App\Http\Resources\DataResource;

class DataController extends Controller
{
    /**
     * @param DataRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(DataRequest $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');

        $query = Data::query();

        if ($from){
            $query->where('created_at', '>=', $from);
        }

        if ($to){
            $query->where('created_at', '=<', $to);
        }

        return DataResource::collection($query->get());
    }
}