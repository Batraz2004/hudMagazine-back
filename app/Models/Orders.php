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
    protected $fillable =['id','user_id','e-mail','address','phone','comment','total_price','status'];
    protected $hidden = ['created_at','update_at'];

    public function items()
    {
        return $this->hasMany(OrderItems::class,'orderId');
    }
}
