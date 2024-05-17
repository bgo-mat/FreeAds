<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;

class AuthController extends Controller
{
    public function verify(Request $request){
       $user =User::find($request->route("id"));

        User::where('id', $user->id)
            ->update([
                'email_verified_at' => now()
            ]);

        Auth::user();

       return view('validate');
    }

    public function connect(Request $request){
        $credentials = $request ->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        if (!Auth::attempt($credentials)) {
            return redirect()->route('login');
        }

        Auth::user();

        if (is_null($request->user()->email_verified_at)) {
            return response("Verifie ton mail frero", 403);
        }
        return redirect()->route('user.accueil');
    }


    public function deconnect(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
