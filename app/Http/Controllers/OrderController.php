<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $data = $request->input();
        dd($data);
        $order_data['order_status_id'] = (int)$data['orderStatusId']['id'];
        $order_data['city_id'] = (int)$data['cityId']['id'];
        $order_data['point_id'] = (int)$data['pointId']['id'];
        $order_data['car_id'] = (int)$data['carId']['id'];
        $order_data['color'] = $data['color'];
        $order_data['date_from'] = $data['dateFrom'];
        $order_data['date_to'] = $data['dateTo'];
        $order_data['rate_id'] = (int)$data['rateId']['id'];
        $order_data['price'] = $data['price'];
        $order_data['is_full_tank'] = $data['isFullTank'];
        $order_data['is_need_child_chair'] = $data['isNeedChildChair'];
        $order_data['is_right_wheel'] = $data['isRightWheel'];

        $order = new Order($order_data);
       
        $order->save();
        
        return new OrderResource($order);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
