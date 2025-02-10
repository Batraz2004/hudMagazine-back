<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;
    protected $table = 'goods';
    protected $primaryKey = 'id';
    protected $hidden= ['id'];
    protected $fillable = ['category_id','name','price','count','image_src','Type'];
}
