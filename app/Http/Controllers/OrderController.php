<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Resources\OrderResource;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return OrderResource::collection($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $data = $request->input();
        if (!empty($data)) {

            $order = new Order($data);
       
            $order->save();
            
            return new OrderResource($order);
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
        $order = Order::find($id);

        if (empty($order)) {
            return response()->json(['msg' => "Заказ id=[{$id}] не найден!"]); 
        } else {
            return new OrderResource($order);
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);

        if (empty($order)) {
            return response()->json(['msg' => "Заказ id=[{$id}] не найден"]); 
        } else {
            return new OrderResource($order);
        }    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (empty($order)) {
            return response()->json(['msg' => "Заказ id=[{$id}] не найден"]); 
        }

        $data = $request->all();

        $result = $order->update(['order_status_id' => (int)$data['orderStatusId']['id']]);

        if ($result) {
            return (new OrderResource($order))->additional(['success' => 'Заказ подтвержден']);    

        } else {
            return (new OrderResource($order))->additional(['msg' => 'Ошибка сохранения']);    
        }
    }
}
