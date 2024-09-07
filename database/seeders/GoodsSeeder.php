<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GoodsSeeder extends Seeder
{
    private $count = 10;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ; $i<$this->count; $i++){
            DB::table('Goods')->insert(['name'=>Str::random(10),
                'Type'=>Str::random(10),
                'count'=>rand(1,10),
                'price'=>rand(500,4500)]);
        }
    }
}
