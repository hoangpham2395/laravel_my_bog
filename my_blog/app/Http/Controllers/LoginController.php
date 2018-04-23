<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Validator;
use Auth;


class LoginController extends Controller
{

    public function getLogin() 
    {
    	return view('login.login');
    }

    public function postLogin(Request $request) 
    {
        // Validate
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ];

        // Thông báo bằng tiếng Việt
        // $messages = [
        // 	'email.required' => 'Email là trường bắt buộc.',
        // 	'email.email' => 'Email không đúng định dạng.',
        // 	'password.required' => 'Mật khẩu là trường bắt buộc.',
        // 	'password.min' => 'Mật khẩu phải chứa ít nhất 5 ký tự'
        // ];

        // C1: Dùng validate
        // $this->validate($request, $rules);

        // C2: Dùng validator
        $validator = Validator::make($request->all(), $rules);

        // Dùng validator với thông báo lỗi tự tạo
        // $validator = Validator::make($request->all(), $rules, $messages);

        // Điều hướng
        if ($validator->fails()) 
        {
        	return redirect()->back()->withErrors($validator);
        } 
        else 
        // validate thành công
        {
        	$email = $request->input('email');
        	$password = $request->input('password');

        	if (Auth::attempt(['email' => $email, 'password' => $password])) 
        	{
        		return redirect()->intended('/admin');
        	}
        	else 
        	{	
        		// Email or password bị sai
        		return redirect()->back()->withErrors('Email or password is wrong.')->withInput();
        	}
        }
    }

    public function getRegister() {
        return view('login.register');
    }
}
