<?php

namespace Modules\Account\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function login_show()
    {
        return view('account::front.auth.login');
    }

    public function login(LoginRequest $request)
    {
        if(!User::where("mobile",$request->mobile)->first())
        {
            return back()->with(["error"=>"کاربری با این مشخصات یافت نشد"]);
        }
        if(User::where("mobile",$request->mobile)->first()->status == 1){
            $request->authenticate();
            
            $request->session()->regenerate();
    
            return redirect()->intended(RouteServiceProvider::HOME);
        }else{
            return back()->with(["error"=>"حساب شما در انتظار تایید میباشد"]);
        }

    }
}
