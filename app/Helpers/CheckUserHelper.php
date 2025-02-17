<?php
namespace App\Helpers;
use App\Models\User;
use App\Models\Suppliers;
use Laravel\Sanctum\PersonalAccessToken;

class CheckUserHelper {

    public static function userByToken($reqBearerToken)
    {
        $token = PersonalAccessToken::findToken($reqBearerToken);
        return $token->tokenable->id;//$token->tokenable->toArray() или $token->tokenable->id; что бы сразу получить id 
    }

    public static function supplierByToken($reqBearerToken)
    {
        $token = PersonalAccessToken::findToken($reqBearerToken);
        $isSpplier = User::where('remember_token',$token)
                ->where('is_supplier',1)
                ->first();

        return $isSpplier->toArray()['id'];
    }
}