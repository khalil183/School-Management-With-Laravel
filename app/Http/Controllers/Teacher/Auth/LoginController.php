<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::TEACHER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:teacher')->except('logout','teacherLogout');
    }

    public function showTeacherLoginForm(){
        return view('teacher.auth.login');
    }

    public function teacherLogin(Request $request){
        $this->validate($request,[
            'email'=>'required|string',
            'password'=>'required|string',
        ]);

        $credential=[
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if(Auth::guard('teacher')->attempt($credential,$request->remember)){
            return Redirect()->intended(route('teacher.dashboard'));
        }
        return Redirect()->back()->withInput($request->only('email,remember'));
    }

    public function teacherLogout(){
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.login');
    }

}
