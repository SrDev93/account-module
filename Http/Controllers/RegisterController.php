<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Account\Entities\User;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function register_show()
    {
        return view('account::front.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Renderable
     */
    public function register(Request $request)
    {

        // dd($request);
       
        // validate request
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'mobile' => 'required|unique:users|max:11',
            'email' => 'required|email',
            'position' => 'required|string',
            'password' => 'required|confirmed|min:6',
            'gender' => 'required|in:male,female',
        ]);

        try {
            // create user
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'position' => $request->position,
                'gender' => $request->gender,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole('عضو انجمن');

            return redirect()->route('admin.home');
        } catch (\Exception $exception) {
            
            return back();
        }
    }
}
