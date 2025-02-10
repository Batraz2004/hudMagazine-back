<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Goods;
use App\Models\User;

class Category extends Model
{
    use HasFactory;
    protected $table = 'Category';
    protected $hidden = ['created_at','updated_at'];

    public function products()
    {
        return $this->hasMany(Goods::class,'category_id');
    }

    public function childrens()
    {
        return $this->hasMany(Category::class,'parent_id')->with('products');
    }
}
