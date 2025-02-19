<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Goods;
use App\Models\OrderItems;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'Orders';
    protected $filalble =['id','title','user_id','userGoods_id','cost'];
    protected $hidden = ['created_at','update_at'];

    public function items()
    {
        $this->hasMany(OrderItems::class,'orderId');
    }
}
