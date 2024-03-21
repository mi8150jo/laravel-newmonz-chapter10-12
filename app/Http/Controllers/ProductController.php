<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {        
        // ベースのクエリを作成
        $query = Product::query();

        // カテゴリーIDによる検索
        if ($request->has('category_id') && !empty($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }

        // キーワードによる検索
        if ($request->has('keyword') && !empty($request->keyword)) {
            $keyword = '%'.$request->keyword.'%';
            $query->where(function ($q) use($keyword){
                $q->where('name', 'LIKE', $keyword);
                $q->orWhere('maker', 'LIKE', $keyword);
            });
        }

        // 最低価格による検索
        if (!empty($request->min_price)) {
            $min_price = $request->min_price;
            $query->where('price', '>=', $min_price);
        }

        // 最高価格による検索
        if (!empty($request->max_price)) {
            $max_price = $request->max_price;
            $query->where('price', '<=', $max_price);
        }

        // ソート
        if ($request->has('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        } else {
            // デフォルトは登録順
            $query->orderBy('created_at', 'desc');
        }

        // ページネーションを適用
        $products = $query->paginate(20);
        
        // ビューに渡すデータを準備する
        $data = [
            "products" => $products,
        ];
        
        // index.blade.php ビューにデータを渡して、表示する
        return view("index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $data = ['product' => $product];
        return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'category_id' => 'required|max:255',
        //     'maker' => 'required',
        //     'name' => 'required',
        //     'price' => 'required'
        // ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->maker = $request->maker;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function show(Product $product)
    {
        $data = ['product' => $product];
        return view('product.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data = ['product' => $product];
        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        echo "update";
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->maker = $request->maker;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
