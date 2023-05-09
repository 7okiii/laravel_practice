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

        // inputから入力値を受け取り$newProductに入れる
        $newProduct->product_name = $request->product_name;
        
        // Laravelのバリデーションを使用しinput(product_name)を入力必須にする
        // バリデーションの結果は$errorsに自動で保管されるのでview側でどこでも使用できる
        $request->validate([
            'product_name' => 'required'
        ]);

        // dd($validatedData);

        // saveメソッドでデータベースに入力値を保存
        $newProduct->save();

        // 保存後データベースから全データを取得
        $allProducts = DB::table('products')->get();

        return redirect()->route('dashboard', ['allProducts' => $allProducts]);
    }

    public function showAllProduct()
    {
        // 件数が多いのでpaginateメソッドを利用して15件ずつ表示
        $allProducts = DB::table('products')->paginate(15);

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

    public function delete(Request $request)
    {
        $product = new Product();
        $product->destroy($request->product_id);

        // 削除後データベースから全データを取得
        $allProducts = DB::table('products')->get();
        
        // dd($allProducts);

        return redirect()->route('dashboard', ['allProducts' => $allProducts]);
    }
}
