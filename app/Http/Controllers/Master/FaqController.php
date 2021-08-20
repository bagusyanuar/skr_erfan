<?php

namespace App\Http\Controllers\Master;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Faq;
use Illuminate\Http\Request;

class FaqController extends CustomController
{
    //

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $faq = Faq::all();
        return view('admin.master.FAQ.index')->with(['faq' => $faq]);
    }

    public function add()
    {
        return view('admin.master.FAQ.add');
    }

    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.master.FAQ.edit')->with(['faq' => $faq]);
    }

    public function store(Request $request)
    {
        $data = [
            'question' => $request['question'],
            'answer' => $request['answer'],
        ];
        $this->insert(Faq::class, $data);
        return redirect()->back()->with('success', 'Success Store Your Data!');
    }

    public function patch(Request $request)
    {
        $data = [
            'question' => $request['question'],
            'answer' => $request['answer'],
        ];
        $this->update(Faq::class, $data);
        return redirect()->back()->with('success', 'Success Patch Your Data!');
    }

    public function destroy($id)
    {
        try {
            Faq::destroy($id);
            return $this->jsonResponse('success delete', 200);
        }catch (\Exception $e){
            return $this->jsonResponse('Failed delete', 500);
        }
    }

    public function faqPage()
    {
        $faq = Faq::all();
        return view('shop.faq')->with(['faq' => $faq]);
    }
}
