<?php

namespace App\Http\Controllers\EmployeeAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show()
    {
        return view('auth.employee');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'nip'=>'required',
            'password'=>'required',
        ]);

        $credential = [
            'nip'=>$request->nip,
            'password'=>$request->password,
        ];

        if(Auth::guard('employee')->attempt($credential))
        {
            return redirect()->route('emp.home');
        }else{
            return redirect()->route('emp.show')->with('info', 'Credential is Invalid!');
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect()->route('emp.show');
    }
}
