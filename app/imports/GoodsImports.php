<?php

namespace App\Imports;

use App\Models\Goods;
use Maatwebsite\Excel\Concerns\ToModel;

class goodsImports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Goods([
            "category_id" => $row[0],
            "name" => $row[1],
            "price" => $row[2],
            "image" => $row[3],
            "Type" => $row[4],
        ]);
    }
}
