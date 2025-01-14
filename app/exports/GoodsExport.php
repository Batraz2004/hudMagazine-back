<?php

namespace App\Exports;

use App\Models\Goods;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GoodsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Goods::all();
    }

    public function headings():array
    {
        return [
            "Id категории",
            "Имя",
            "Цена",
            "Количество",
            "Изображение",
            "Тип",
        ];
    }
}
