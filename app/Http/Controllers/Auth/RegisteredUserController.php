<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use function Pest\Laravel\json;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)//: RedirectResponse
    {
        try{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],//обязательное поле с типом строки которое может сожержать максимум 255 символов
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],// 'unique:'.User::class: Эта часть кода указывает, что email должен быть уникальным среди записей таблицы пользователей (User)
                'password' => ['required', 'confirmed', Rules\Password::defaults()],//'confirmed': Это правило подтверждает, что пароль, указанный пользователем, совпадает с повторно введенным паролем. // Rules\Password::defaults() специальные правила для пароля
            ]);//если валидация не пройдет то создается исключение
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        catch(Exception $e)
        {
            echo '<pre>'.htmlentities(print_r('произошла ошибка:'.$e->getmessage(), true)).'</pre>';exit();
        }
        event(new Registered($user));

        $token = $user->createToken('auth_token')->plainTextToken;//из класса HasApiTokens который подключен в модели user
        $token = explode('|',$token)[1]
        $user->remember_token = $token;
        $user->save();
        //standart logic:
            
        /*
        Auth::login($user);
        
        return redirect(RouteServiceProvider::HOME);*/
        //for token:
        return response()->json([
            'status' => $token,
            'token_type' => 'Bearer',
            'user' => $user]);
    }
}
