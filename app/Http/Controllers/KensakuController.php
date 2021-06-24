<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kensaku;
 
class KensakuController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $stock = $request->input('stock');
 
        $query = Kensaku::query();
 
        if (!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('author', 'LIKE', "%{$keyword}%");
        }
 
        if (!empty($stock)) {
            $query->where('stock', '>=', $stock);
        }
 
        $kensaku = $query->get();
 
        return view('kensaku.index', compact('kensaku', 'keyword', 'stock'));
    }
}