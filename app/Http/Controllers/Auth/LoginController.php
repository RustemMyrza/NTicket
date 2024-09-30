<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function showLoginForm()
     {
         // Проверяем, авторизован ли пользователь
         if (Auth::check()) {
            return 'TRUE';
             return redirect('/mainPage');
         }
 
         // Если пользователь не авторизован, показываем форму входа
         return view('auth.login');
     }

     public function logout(Request $request)
     {
         Auth::logout();
 
         $request->session()->invalidate();
 
         $request->session()->regenerateToken();
 
         return redirect('/login');
     }
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
