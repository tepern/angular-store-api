<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Http\Resources\PointResource;
use Illuminate\Http\Request;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $points = Point::all();

        return PointResource::collection($points);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $point = Point::findOrFail($id);
        
        return new PointResource($point);
    }
}
