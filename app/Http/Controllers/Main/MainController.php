<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Products;
use App\Model\Sliders;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */
    public function __invoke(Request $request)
    {
        $categories = Categories::all();
//        $slider = Sliders::all();
        $products = Products::orderBy('id', 'DESC')->get();
//        return view('main.index')->with([
//            'products' => $products,
//            'categories' => $categories,
//            'sliders' => $slider,
//        ]);
        return view('shop.index')->with(['isHome' => true, 'products' => $products, 'categories' => $categories]);
    }
}
