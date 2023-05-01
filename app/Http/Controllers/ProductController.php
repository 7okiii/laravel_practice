<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $newProduct = new Product;
        $newProduct->product_name = $request->product_name;
        
        // dd('dd');
        $request->validate([
            'product_name' => 'required'
        ]);

        // dd($validatedData);

        $newProduct->save();

        $allProducts = DB::table('products')->get();

        return redirect()->route('dashboard', ['allProducts' => $allProducts]);
    }

    public function showAllProduct()
    {
        $allProducts = DB::table('products')->get();

        return view('dashboard', compact('allProducts'));
    }

    public function update(Request $request)
    {
        // idが編集ボタンが持つIDと同じプロダクトを$productに代入
        $product = Product::find($request->product_id);

        // dd($request->product_name);

        // 対象の商品名にajaxで送られてきたinputの値を代入
        $product->product_name = $request->product_name;

        // 変更を保存
        $product->save();
    }
}
