<?php

namespace App\Http\Controllers;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Log;
use Socialite;

use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    public function redirect($social) 
    {
    	return Socialite::driver($social)->redirect();
    }

    public function callback($social) 
    {
    	$user = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);
        auth()->login($user);

        return redirect()->to('/blog');
    }
}
