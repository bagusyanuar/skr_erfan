<?php

namespace App\Http\Controllers\Master;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use function Illuminate\Support\Arr;

class ProductsControllers extends CustomController
{
    /**
     * ProductsControllers constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $products = Products::with('category')->get();
        return view('admin.master.Products.index')->with(['products' => $products]);
    }

    public function pageAdd()
    {
        $categories = Categories::all();
        return view('admin.master.Products.add')->with(['categories' => $categories]);
    }

    public function pageEdit($id)
    {
        $products = Products::find($id);
        $categories = Categories::all();
        return view('admin.master.Products.edit')->with(['products' => $products, 'categories' => $categories]);
    }

    public function add(Request $request)
    {
        $imageName = $this->generateImageName('images');
        $data = [
            'category_id' => $request['category'],
            'name' => $request['name'],
            'price' => $request['price'],
            'qty' => $request['qty'],
            'description' => $request['description'],
            'images' => $imageName,
        ];
        $this->uploadImage('images', $imageName, 'upload');
        $this->insert(Products::class, $data);
        return redirect()->back()->with('success', 'Success Store Your Data!');
    }

    public function edit(Request $request)
    {
        $imageName = $this->generateImageName('images');
        $data = [
            'category_id' => $request['category'],
            'name' => $request['name'],
            'price' => $request['price'],
            'qty' => $request['qty'],
            'description' => $request['description'],
        ];

        if ($request->hasFile('images')){
            $data = Arr::add($data, 'images', $imageName);
            $this->uploadImage('images', $imageName);
        }
        $this->update(Products::class, $data);
        return redirect()->back()->with('success', 'Success Patch Your Data!');
    }

    public function destroy($id)
    {
        try {
            Products::destroy($id);
            return $this->jsonResponse('success delete', 200);
        }catch (\Exception $e){
            return $this->jsonResponse('Failed delete', 500);
        }
    }
}
