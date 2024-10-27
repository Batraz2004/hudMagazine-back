<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use App\Models\Goods;
class GoodsSeeder extends Seeder
{
    private $count = 10;
    private $types = ['Ручки','Карандаши','Краски','Кисти'];
    private $names = ['abba','blueSky','ddd','jk'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //если нада удалить)
        // $goods = Goods::get();
        // foreach($goods as $val)
        // {
        //     $val->delete();
        // }
        for($i = 0 ; $i<$this->count; $i++){
            DB::table('Goods')->insert([
                //'name'=>Str::random(10),
                'name' => $this->names[rand(0,count($this->names)-1)],
                'Type' => $this->types[rand(0,count($this->types)-1)],
                'count' => rand(1,10),
                'price' => rand(500,4500)]);
        }

    }
}
