<?php

namespace amin\Http\Controllers;

use amin\MainOrder;
use Illuminate\Http\Request;

class MainOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = \amin\MainOrder::paginate(15);
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers=\amin\Customer::all();
        $socialApps=\amin\SocialAppConfig::all();
        return view('order.create.p1',compact('customers','socialApps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input());

    }

    public function store_p1(Request $request)
    {
        session([
            'customer_id' => $request->input('customer_id'),
            'social_app_id' => $request->input('social_app_id'),
        ]);

        if ($request->input('social_app_id')==1) {
            // Instagram
            $pages=\amin\InstagramPage::all();
            return view('order.create.p2.instagram', compact('pages'));
        }
        // Telegram
        $pages=\amin\TelegramChannel::all();
        $plans=\amin\TelegramPlan::all();
        return view('order.create.p2.telegram', compact('pages','plans'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \amin\MainOrder  $mainOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)//MainOrder $mainOrder)
    {
        return json_encode(\amin\MainOrder::find($id)->allFields());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \amin\MainOrder  $mainOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(MainOrder $mainOrder)
    {
        return view(order.edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \amin\MainOrder  $mainOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainOrder $mainOrder)
    {
        if ($request->input('change_confirmation')) {
            $mainOrder=MainOrder::findOrFail($request->input('id'));
            $mainOrder->update([
                'payment_confirmed' => !$mainOrder->payment_confirmed,
                'payment_date' => now()->toDateTimeString(),
            ]);
            return "success!";
            
        }
        return "What?!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \amin\MainOrder  $mainOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainOrder $mainOrder)
    {
        MainOrder::find(request()->id)->delete();
        return "deleted";
    }
}
