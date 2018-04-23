<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use  App\Http\Controllers\Auth\Request;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function getLogin() 
    // {
    //     return view('login.login');
    // }

    // public function postLogin(Request $request) 
    // {
    //     // Validate
    //     $rules = [
    //         'email' => 'required|min:5',
    //         'password' => 'required|min:5'
    //     ];
    //     $this->validate($request, $rules);

    //     $data = [
    //         'email' => $request->input('email'),
    //         'password' => md5($request->input('password'))
    //     ];

    //     if (Auth::attempt($data)) {
    //         return redirect('blog')->with('message', $data['name']);
    //     } else {
    //         return redirect()->back()->with('error', 'Username ('.$data['name'].') or password ('.$data['password'].') is wrong.');
    //     }
    // }
}
