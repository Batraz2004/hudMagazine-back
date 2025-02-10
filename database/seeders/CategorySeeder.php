<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    private $names = ['Ручки','Карандаши','Краски','Кисти','Холсты','Альбомы','Блакноты'];
    private $records = [];
    private $count = 0;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [];
        while($this->count < count($this->names))
        {
            $records[] = [
                'title' => $this->names[$this->count],
                'sort' => rand(1,15),
            ];
            $this->count++;
        }
        DB::table('Category')->insert($records);
        /*
        Category::factory()
            ->count(count($names))
            ->state($names)
            ->create();*/
    }
}
