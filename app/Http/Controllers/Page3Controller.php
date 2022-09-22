<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;

class Page3Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function page3(Request $request)
    {
        $input = $request->except(['_token']);
        $data = [
            "B-1" => [
                'answer' => data_get($input, "B-1", ''),
            ],
            "B-1-1" => [
                'answer' => data_get($input, "B-1-1", ''),
            ],
            "B-1-2" => [
                'answer' => data_get($input, "B-1-2", ''),
            ],
            "B-1-2-6" => [
                'answer' => data_get($input, "B-1-2-6", ''),
            ],
            "B-2" => [
                'answer' => data_get($input, "B-2", ''),
            ],
            "B-2-1" => [
                'answer' => data_get($input, "B-2-1", ''),
            ],
            "B-2-2" => [
                'answer' => data_get($input, "B-2-2", ''),
            ],
            "B-3-1" => [
                'answer' => data_get($input, "B-3-1", ''),
            ],
            'B-3-2' => [
                'answer' => data_get($input, 'B-3-2', ''),
            ],
            "B-3-3" => [
                'answer' => data_get($input, "B-3-3", ''),
            ],
        ];
        Result::updateOrCreate(
            ['user_id' => auth()->id()],
            ['page2' => $data]
        );
        $maxPage = $request->session()->get('maxPage');
        if ($maxPage < 3) {
            $maxPage = $request->session()->put('maxPage', '2');
        }

        if (data_get($input, "save-return", '') == 'return') {
            session()->flash('msg', '儲存成功');
            return redirect()->back();
        } 

        return redirect('/page3');
    }
}
