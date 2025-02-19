<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'usersGoods';
    protected $fillable = ['id','name','quantity','usersID','goodsID'];

    public function product()
    {
        return $this->belongsTo(Goods::class,'goodsId');
    } 
}
