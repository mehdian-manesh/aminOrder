<?php

namespace amin\Http\Controllers;

use amin\InstagramOrder;
use Illuminate\Http\Request;

class InstagramOrderController extends Controller
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
        sesion([
            'instagram_page_id' => $request->input('page_id'),
            'ad_duration'   => $request->input('ad_duration'),
            'social_network_type' => 'amin\InstagramOrder',
        ]);
        $final_price=$request->input('ad_duration')*$request->input('unit_price');
        return view(order.create.p3,compact('final_price'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \amin\InstagramOrder  $instagramOrder
     * @return \Illuminate\Http\Response
     */
    public function show(InstagramOrder $instagramOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \amin\InstagramOrder  $instagramOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(InstagramOrder $instagramOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \amin\InstagramOrder  $instagramOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InstagramOrder $instagramOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \amin\InstagramOrder  $instagramOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstagramOrder $instagramOrder)
    {
        //
    }
}
