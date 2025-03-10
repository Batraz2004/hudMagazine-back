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
    protected $filalble =['id','user_id','e-mail','address','phone','comment','total_price'];
    protected $hidden = ['created_at','update_at'];

    public function items()
    {
        return $this->hasMany(OrderItems::class,'orderId');
    }
}
