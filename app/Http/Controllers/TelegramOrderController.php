<?php

namespace amin\Http\Controllers;

use amin\TelegramOrder;
use Illuminate\Http\Request;

class TelegramOrderController extends Controller
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
        session([
            'telegram_channel_id' => $request->input('page_id'),
            'telegram_plan_id' => $request->input('plan_id'),
            'views'   => $request->input('views'),
            'social_network_type' => 'amin\TelegramOrder',
        ]);
        $final_price=$request->input('views')/1000*$request->input('unit_price');
        return view('order.create.p3',compact('final_price'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \amin\TelegramOrder  $telegramOrder
     * @return \Illuminate\Http\Response
     */
    public function show(TelegramOrder $telegramOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \amin\TelegramOrder  $telegramOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(TelegramOrder $telegramOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \amin\TelegramOrder  $telegramOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TelegramOrder $telegramOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \amin\TelegramOrder  $telegramOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(TelegramOrder $telegramOrder)
    {
        //
    }
}
