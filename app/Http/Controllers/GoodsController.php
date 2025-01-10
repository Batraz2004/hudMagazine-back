<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Goods;
use App\Exports\GoodsExport;
use App\Imports\goodsImports;
use App\Models\User;

use function Pest\Laravel\json;

class GoodsController extends Controller
{
    public function getList(Request $request)
    {   
        $goods = Goods::get()->toArray();
        return response()->json(['succes'=>true,'data'=>$goods,'code'=>200]);
    }

    public function import(Request $request)
    {
        $file = $request->file('exFile');
        Excel::import(new GoodsImports,$file);
        return response()->json(['succes'=>true,'data'=>"",'code'=>200]);
    }

    public function export(Request $request)
    {
        return Excel::download(new GoodsExport, 'products.xlsx');
    }
}
