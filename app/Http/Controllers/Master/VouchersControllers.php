<?php

namespace App\Http\Controllers\Master;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Model\Promo;
use Illuminate\Http\Request;

class VouchersControllers extends CustomController
{
    //
    /**
     * VouchersControllers constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $vouchers = Promo::all();
        return view('admin.master.Vouchers.index')->with(['vouchers' => $vouchers]);
    }

    public function pageAdd()
    {
        return view('admin.master.Vouchers.add');
    }

    public function pageEdit($id)
    {
        $vouchers = Promo::findOrFail($id);
        return view('admin.master.Vouchers.edit')->with(['vouchers' => $vouchers]);
    }

    public function add(Request $request)
    {
        $data = [
            'code' => $request['code'],
            'name' => $request['name'],
            'type' => $request['type'],
            'amount' => $request['amount'],
            'percent' => $request['percent'],
            'active' => $request['active'],
            'minimal' => $request['minimal'],
        ];
        $this->insert(Promo::class, $data);
        return redirect()->back()->with('success', 'Success Store Your Data!');
    }

    public function edit(Request $request)
    {
        $data = [
            'code' => $request['code'],
            'name' => $request['name'],
            'type' => $request['type'],
            'amount' => $request['amount'],
            'percent' => $request['percent'],
            'active' => $request['active'],
            'minimal' => $request['minimal'],
        ];

        $this->update(Promo::class, $data);
        return redirect()->back()->with('success', 'Success Patch Your Data!');
    }
}
