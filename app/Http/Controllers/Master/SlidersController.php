<?php

namespace App\Http\Controllers\Master;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Model\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SlidersController extends CustomController
{
    //
    /**
     * SlidersController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $sliders = Sliders::all();
        return view('admin.master.Sliders.index')->with(['sliders' => $sliders]);
    }

    public function pageAdd()
    {
        return view('admin.master.Sliders.add');
    }

    public function pageEdit($id)
    {
        $sliders = Sliders::findOrFail($id);
        return view('admin.master.Sliders.edit')->with(['sliders' => $sliders]);
    }

    public function add(Request $request)
    {
        $imageName = $this->generateImageName('images');
        $data = [
            'active' => $request['active'],
            'url' => $imageName,
        ];
        $this->uploadImage('images', $imageName, 'sliders');
        $this->insert(Sliders::class, $data);
        return redirect()->back()->with('success', 'Success Store Your Data!');
    }

    public function edit(Request $request)
    {
        $imageName = $this->generateImageName('images');
        $data = [
            'active' => $request['active'],
        ];

        if ($request->hasFile('images')){
            $data = Arr::add($data, 'url', $imageName);
            $this->uploadImage('images', $imageName, 'sliders');
        }
        $this->update(Sliders::class, $data);
        return redirect()->back()->with('success', 'Success Patch Your Data!');
    }
}
