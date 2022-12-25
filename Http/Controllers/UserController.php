<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Modules\Base\Entities\Photo;

class UserController extends Controller
{
    public function profile()
    {
        return view('account::front.panel.profile');
    }

    public function update(Request $request)
    {
        try {
            Auth::user()->first_name = $request->first_name;
            Auth::user()->last_name = $request->last_name;
            Auth::user()->mobile = $request->mobile;
            Auth::user()->email = $request->email;
            Auth::user()->gender = $request->gender;

            if ($request->photo){
                if (Auth::user()->photo){
                    File::delete(Auth::user()->photo->path);
                    Auth::user()->photo->path = file_store($request->photo, 'assets/uploads/users/photos/', 'photo_');
                    Auth::user()->photo->save();
                }else {
                    $photo = new Photo();
                    $photo->path = file_store($request->photo, 'assets/uploads/users/photos/', 'photo_');
                    Auth::user()->photo()->save($photo);
                }
            }
            Auth::user()->save();

            return redirect()->back()->with('flash_message', 'با موفقیت بروزرسانی شد');
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }
}
