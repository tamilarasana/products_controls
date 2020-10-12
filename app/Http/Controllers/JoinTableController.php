<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class JoinTableController extends Controller
{
    public function index()
    {
        $data = DB::table('category')
                ->join('unit', 'unit.id', '=', 'category.id')
                ->join('product', 'product.id', '=', 'unit.id')
                ->select('category.cname', 'unit.uname', 'product.pprice')
                 ->get();
                return view('jointable', compact('data'));
    }
}
