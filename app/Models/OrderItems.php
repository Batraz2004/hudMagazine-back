<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;
use App\Models\Goods;

class OrderItems extends Model
{
    use HasFactory;
    protected $table ='order_items';
    protected $fillable = ['id','name','price','total_price','quantity','user_id','goodsId','orderId'];
    protected $hidden = ['created_at','updated_at'];

    public function Good()
    {
        return $this->belongsTo(Goods::class,'goodsId');
    }

    public function Order()
    {
        return $this->belongsTo(Orders::class,'orderId');
    }
}
