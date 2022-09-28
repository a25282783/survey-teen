<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;

class Page5Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function answerArray($key, $num)
    {
        $res = [];
        $input = request()->input($key);
        if ($input && is_array($input)) {
            for ($i = 1; $i < $num + 1; $i++) {
                $res[$key . '_' . $i] = '0';
                if (in_array($i, $input)) {
                    $res[$key . '_' . $i] = '1';
                }
            }
        } else {
            for ($i = 1; $i < $num + 1; $i++) {
                $res[$key . '_' . $i] = '0';
            }
        }
        return $res;
    }

    public function page5(Request $request)
    {
        $input = $request->except(['_token']);
        $data = [
            'D_1' => [
                'answer' => data_get($input, 'D_1', ''),
            ],
            'D_1_1' => [
                'answer' => data_get($input, 'D_1_1', ''),
            ],
            'D_1_2' => [
                'answer' => data_get($input, 'D_1_2', ''),
            ],
            'D_2' => [
                'answer' => data_get($input, 'D_2', ''),
            ],
            'D_2_1' => [
                'answer' => data_get($input, 'D_2_1', ''),
            ],
            'D_2_2' => [
                'answer' => data_get($input, 'D_2_2', ''),
            ],
            'D_3' => [
                'answer' => data_get($input, 'D_3', ''),
            ],
            'D_3_1' => [
                'answer' => data_get($input, 'D_3_1', ''),
            ],
            'D_3_2' => [
                'answer' => data_get($input, 'D_3_2', ''),
            ],
            'D_4' => [
                'answer' => data_get($input, 'D_4', ''),
            ],
            'D_4_1' => [
                'answer' => data_get($input, 'D_4_1', ''),
            ],
            'D_5' => [
                'answer' => $this->answerArray('D_5', 13),
            ],
            'D_5_1' => [
                'answer' => data_get($input, 'D_5_1', ''),
            ],
        ];

        Result::updateOrCreate(
            ['user_id' => auth()->id()],
            ['page4' => $data]
        );
        $maxPage = $request->session()->get('maxPage');
        if ($maxPage < 5) {
            $maxPage = $request->session()->put('maxPage', '4');
        }

        if (data_get($input, "save-return", '') == 'return') {
            session()->flash('msg', '儲存成功');
            return redirect()->back();
        } 
        return redirect('/page5');
    }
}
