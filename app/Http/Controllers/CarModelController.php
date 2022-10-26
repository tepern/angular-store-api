<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarModelsRequest;
use App\Models\CarModel;
use App\Http\Resources\CarModelResource;
use App\Http\Resources\CarModelCollection;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        if (!empty($data['limit']) && $data['limit']>0) {
            return new CarModelCollection(
                CarModel::paginate($data['limit'])
            );
        } else {
            return new CarModelCollection(
                CarModel::all()
            );
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carModel = CarModel::findOrFail($id);
        
        return new CarModelResource($carModel);
    }
}
