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
    private $id = null;

    public function __construct($id = null)
    {
        $this->id = $id;
    }

    public function collection()
    {
        if(!is_null($this->id))
        {
            return Goods::where('category_id',$this->id)->get();
        }
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
