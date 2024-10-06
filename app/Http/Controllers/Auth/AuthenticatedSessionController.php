<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    /*
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }*/
    public function store(Request $reg)
    {
        try{
            $reg->validate([
                'email'=>['string','email','required','max:255'],
                'password'=>['required', 'string']
            ]);
            
            if (!Auth::attempt($reg->only('email', 'password'))) {
                return response()->json(['message' => 'Invalid login credentials'], 401);
            }
        }
        catch(Exception $e)
        {
            echo '<pre>'.htmlentities(print_r('произошла ошибка'.$e->getmessage(), true)).'</pre>';exit();
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;
        
        return response()->json([
            'succes_token'=>$token,
            'token_type'=>'Bearer',
            'user'=>$user,
            'status' => 'Login successful']);
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Auth::guard('web')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return redirect('/');
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout successful']);
    }
}
