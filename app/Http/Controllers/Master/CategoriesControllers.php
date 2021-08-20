<?php

namespace App\Http\Controllers\Master;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Obat;
use Illuminate\Http\Request;

class CategoriesControllers extends CustomController
{
    //

    /**
     * CategoriesControllers constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $categories = Categories::all();
        return view('admin.master.Categories.index')->with(['categories' => $categories]);
    }

    public function add()
    {
        return view('admin.master.Categories.add');
    }

    public function edit($id)
    {
        $categories = Categories::find($id);
        return view('admin.master.Categories.edit')->with(['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request['name']
        ];
        $this->directInsert(Categories::class, $data);
        return redirect()->back()->with('success', 'Success Store Your Data!');
    }

    public function patch(Request $request)
    {
        $id = $request['id'];
        $data = ['name' => $request['name']];
        $this->directUpdate(Categories::class, $id, $data);
        return redirect()->back()->with('success', 'Success Patch Your Data!');
    }

    public function destroy($id)
    {
        try {
            Categories::destroy($id);
            return $this->jsonResponse('success delete', 200);
        }catch (\Exception $e){
            return $this->jsonResponse('Failed delete', 500);
        }
    }
}
