<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Http\Resources\RateResource;
use Illuminate\Http\Request;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rate::all();

        return RateResource::collection($rates);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rate = Rate::findOrFail($id);
        
        return new RateResource($rate);
    }
}
