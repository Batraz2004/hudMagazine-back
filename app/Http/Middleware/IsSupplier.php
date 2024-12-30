<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IsSupplier
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
        
        $isSpplier = User::where('remember_token',$token)
            ->where('is_supplier',1)
            ->first();
            
        if(empty($isSpplier))
        {
            return response()->json(['succes'=>false,'message'=>'только поставщики могут выполнять данную операцию','code'=>403],403);
        }

        return $next($request);
    }
}
