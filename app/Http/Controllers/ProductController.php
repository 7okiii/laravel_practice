<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $newProduct = new Product;
        $newProduct->product_name = $request->product_name;
        
        $newProduct->save();

        $allProducts = DB::table('products')->get();

        return redirect()->route('dashboard', ['allProducts' => $allProducts]);
    }

    public function showAllProduct()
    {
        $allProducts = DB::table('products')->get();

        return view('dashboard', compact('allProducts'));
    }
}
