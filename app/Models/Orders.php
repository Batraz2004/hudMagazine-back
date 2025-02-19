<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Goods;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'Orders';
    protected $filalble =['id','title','user_id','userGoods_id','cost'];
    protected $hidden = ['created_at','update_at'];

    public function Good()
    {
        return $this->HasOne(Goods::class,'id','goodsId');
    }
}
