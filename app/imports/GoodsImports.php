<?php

namespace App\Imports;

use App\Models\Goods;
use Maatwebsite\Excel\Concerns\ToModel;

class GoodsImports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       // echo '<pre>'.htmlentities(print_r($row[5], true)).'</pre>';exit();
        return new Goods([
            "category_id" => $row[0],
            "name" => $row[1],
            "price" => $row[2],
            "count" => $row[3],
            "image_src" => $row[4],
            "Type" => $row[5],
        ]);
    }
}
