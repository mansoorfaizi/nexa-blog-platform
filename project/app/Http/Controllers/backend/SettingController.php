<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function index()
    {
        return view('backend.setting.index')->with('setting', Setting::first());
    }

    public function store(Request $request)
    {

        Setting::where('id', '1')->update(['logo'=>$request->logo, 'facebook'=>$request->facebook, 'twitter'=>$request->twitter, 'email'=>$request->email, 'phone_number'=>$request->phone_number, 'address'=>$request->address]);

        Session::flash('success', 'Setting Updated');

        return redirect()->back();
    }
}
