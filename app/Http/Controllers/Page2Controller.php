<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;

class Page2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function page2(Request $request)
    {
        $input = $request->except(['_token']);
        $data = [
            '帳號' => auth()->user()->name,
            '密碼' => auth()->user()->password_uncrypt,
            '公司名稱' => $input['company'],
            '樣本編號' => $input['serial'],
            '填表人' => $input['name'],
            '部門' => $input['depart'],
            '電話' => $input['phone'],
            'A-1' => [
                'answer' => $input['A-1'],
            ],
            'A-2' => [
                'answer' => $input['A-2'],
            ],
            'A-3-1' => [
                'answer' => $input['A-3-1'],
            ],
            'A-3-2' => [
                'answer' => $input['A-3-2'],
            ],
        ];
        Result::updateOrCreate(
            ['user_id' => auth()->id()],
            ['page1' => $data]
        );

        $maxPage = $request->session()->get('maxPage');
        if ($maxPage < 2) {
            $maxPage = $request->session()->put('maxPage', '1');
        }

        if (data_get($input, "save-return", '') == 'return') {
            session()->flash('msg', '儲存成功');
            return redirect()->back();
        } 

        return redirect('/page2');
    }
}
