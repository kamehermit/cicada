<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Auth;
use Socialite;

class AuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        try{
            $user = Socialite::driver('facebook')->user();
        }
        catch(Exception $e){
            return Redirect::to('auth/facebook');
        }
        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return Redirect::to('dashboard');
    }

    private function findOrCreateUser($facebookUser){
        if ($authUser = User::where('facebook_id', $facebookUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'github_id' => $facebookUser->id,
            'avatar' => $facebookUser->avatar
        ]);
    }
}
