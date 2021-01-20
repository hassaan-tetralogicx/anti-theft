<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if(){
//
//        }
//        dd(Auth::user());
        $setting = Setting::where('shop_id', Auth::user()->id)->first();
        $check = Auth::user()->plan_id;
        return view('welcome')->with(['status' => $setting, 'plan_check' => $check]);
    }

    public function activation(Request $request, $id)
    {

//        dump($request->all());
//        dd($id);
//        $find_id = Setting::find($id);
        $find_id = Setting::where('shop_id', $id)->first();
//        dd($find_id);
//        dd($id == Auth()->user()->id);
        if ($find_id != null) {
//            $status = Setting::where('shop_id', $id);
//            dd($status);
            if('text_protection' == $request->type){
                $find_id->text_protection = $request->status;
            }
            elseif('image_protection' == $request->type){
                $find_id->image_protection = $request->status;
            }
            elseif('disable_right_click' == $request->type){
                $find_id->disable_right_click = $request->status;
            }
            elseif('disable_short_keys' == $request->type){
                $find_id->disable_short_keys = $request->status;
            }

            $find_id->save();
        }
        else {
            $status = new Setting();
            $status->shop_id = Auth::user()->id;
            $status->text_protection = $request->status;
            $status->image_protection = false;
            $status->disable_right_click = false;
            $status->disable_short_keys = false;
            $status->save();

        }
//        return response()->json
    }
    public function response(){
//        dd(123);
        return 123;
//        $setting = Setting::where('shop_id', Auth::user()->id)->first();
//        if($setting->text_protection == 1){
//
//        }
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
//        dd($request->status);


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
