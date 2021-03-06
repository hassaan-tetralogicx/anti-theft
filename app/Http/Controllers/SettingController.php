<?php

namespace App\Http\Controllers;
use App\Setting;
use App\User;
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
        $setting = Setting::where('shop_id', Auth::user()->id)->first();
        $check = Auth::user()->plan_id;
        return view('welcome')->with(['status' => $setting, 'plan_check' => $check]);
    }

    public function activation(Request $request, $id)
    {
        $find_id = Setting::where('shop_id', $id)->first();

        if ($find_id != null) {
            if('text_protection' == $request->type){
                $find_id->text_protection = $request->status;
            }
            elseif('image_protection' == $request->type){
                $find_id->image_protection = $request->status;
            }
            $find_id->save();
        }
        else {
            $status = new Setting();
            $status->shop_id = Auth::user()->id;
            $status->text_protection = $request->status;
            $status->image_protection = false;
            $status->save();
        }
//        return response()->json
    }
    public function response(Request $request)
    {
//        return response("".$request->input('shop'))->header('Content-Type', 'application/javascript');

        $shop = $request->input('shop');
//        dd($shop);
        $user = Auth::user();
        $shop_id = User::where('name', $shop)->first();
//        dd($shop_id);
        $check_setting = Setting::where('shop_id', $shop_id->id)->first();
        return view('response')->with(['check_setting' => $check_setting, 'user' => $user])->render();

    }

    public function pricing()
    {
        $user = User::where('id', auth()->user()->id)->first();
//        dd($user->plan);
//        $user_plan = $user->plan
        return view('pricing')->with('user', $user);
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
