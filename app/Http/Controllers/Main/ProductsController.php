<?php

namespace App\Http\Controllers\Main;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Products;
use App\Model\Reviews;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductsController extends CustomController
{
    //
    /**
     * ProductsController constructor.
     */
    public function __construct()
    {
        parent::__construct();

    }

    public function index(Request $request)
    {
        $categories = Categories::all();
        $selected = "";
        if ($request->query->get('kategori') !== ""){
            $selected = $request->query->get('kategori');
        }
        return view('shop.products')->with(['categories' => $categories, 'selected' => $selected]);
    }

    public function getProductsById($id)
    {
        $products = Products::find($id);
        $categories = Categories::all();
        $reviews = Reviews::with(['product','user'])->get();
//        return $reviews->toArray();
//        return view('main.detail-product')->with(['products' => $products, 'reviews' => $reviews]);
        return view('shop.detail')->with(['products' => $products, 'reviews' => $reviews, 'isHome' => true, 'categories' => $categories]);
    }

    public function getProducts(Request $request)
    {
        try {
            $category = $request->query->get('category');
            $search = $request->query->get('search');
            $products = Products::whereHas('category', function (Builder $query) use ($category) {
                if ($category !== null) {
                    $query->where('id', '=', $category);
                } else {
                    $query->where('id', 'LIKE', '%%');
                }
            })->where('name', 'LIKE', '%' . $search . '%')->get();
            return $this->jsonResponse($products->toArray(), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
