<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

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


        $request->validate([
            'total_price' => ['required', 'decimal:2'],
            'costumer_name' => ['required', 'string', 'max:40'],
            'costumer_phone' => ['required', 'numeric', 'max:15'],
            'costumer_mail' => ['required', 'string', 'email', 'max:100'],
            'costumer_address' =>  ['required', 'string', 'max:200'],
        ]);

        $data = $request->all();

        $new_order = new Order();
        $new_order->date = now();
        $new_order->total_price = $data['total_price'];
        $new_order->costumer_name = $data['costumer_name'];
        $new_order->costumer_phone = $data['costumer_phone'];
        $new_order->costumer_mail = $data['costumer_mail'];
        $new_order->costumer_address = $data['costumer_address'];
        $new_order->status = $data['status'];
        $new_order->save();

        return response()->json([
            'success' => true,
            'results' => ['order' => $new_order]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
