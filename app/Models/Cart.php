<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'UsersGoods';
    protected $fillable = ['id','name','usersID','goodsID'];

    public function product()
    {
        return $this->hasMany(Goods::class,'id','productsId');
    } 
}
