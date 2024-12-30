<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Suppliers;
use Exception;

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

            //для поставщика:
            if((string)$request->isSupplier == "true")
            {
                $supplier = Suppliers::create([
                    'user_id' => $user->id,
                    'company_name' => $request->supplier_company_name,
                    'contact_person' => $request->supplier_contact_person,
                    'company_adress' => $request->supplier_company_adress,
                    'bank_name' => $request->supplier_bank_name,
                ]);
                $user->is_supplier = 1;
                $user->save();
            } 
        }
        catch(Exception $e)
        {
            if($e->getCode() === 0)
            {
                return response()->json([
                    'status' => 500,
                    'message' => 'произошла ошибка:'.$e->getmessage()],500);
            }
            else
            {
                return response()->json([
                    'status' => $e->getCode(),
                    'message' => 'произошла ошибка:'.$e->getmessage()],$e->getCode());
            }
        }
        event(new Registered($user));

        $token = $user->createToken('auth_token')->plainTextToken;//из класса HasApiTokens который подключен в модели user
        $token = explode('|',$token)[1];
        $user->remember_token = $token;
        $user->save();
        //standart logic:
            
        /*
        //изначальная логика для возвращения на страницу сайта после авторизации 
        Auth::login($user);
        
        return redirect(RouteServiceProvider::HOME);*/
        //for token:
        return response()->json([
            'succes_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user],200);
    }
}
