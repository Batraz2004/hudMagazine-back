<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        $personal_acces_tokens = DB::table('personal_access_tokens')
            ->where('token',hash('sha256',$token))//токены захешированы
            ->get();
            //->orderByDesc()->first();//если нужно по свежему(последнему) токену

        if(empty($personal_acces_tokens->toArray()))
        {
            return response()->json(['succes'=>false,'data'=>[],'code'=>401],401);
        }

        /*
        Команда return $next($request); 
        в контексте Laravel означает передачу управления следующему middleware
         или непосредственно обработчику маршрута. 
        */
        return $next($request);
    }
}
