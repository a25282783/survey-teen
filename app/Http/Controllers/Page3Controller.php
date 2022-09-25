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

    public function page3(Request $request)
    {
        $input = $request->except(['_token']);
        $data = [
            "B_1" => [
                'answer' => data_get($input, "B_1", '')
            ],
            "B_1_1" => [
                'answer' => $this->answerArray("B_1_1", 6)
            ],
            "B_1_2" => [
                'answer' => data_get($input, "B_1_2", '')
            ],
            "B_2" => [
                'answer' => $this->answerArray("B_2", 11)
            ],
            "B_2_1" => [
                'answer' => data_get($input, "B_2_1", '')
            ],
            "B_3" => [
                'answer' => data_get($input, "B_3", '')
            ],
            "B_3_1" => [
                'answer' => $this->answerArray("B_3_1", 9)
            ],
            "B_3_2" => [
                'answer' => data_get($input, "B_3_2", '')
            ],
            "B_4" => [
                'answer' => data_get($input, "B_4", '')
            ],
            "B_5" => [
                'answer' => data_get($input, "B_5", '')
            ],
            "B_5_1" => [
                'answer' => data_get($input, "B_5_1", '')
            ],
            "B_5_2" => [
                'answer' => $this->answerArray("B_5_2", 8)
            ],
            "B_5_3" => [
                'answer' => data_get($input, "B_5_3", '')
            ],
            "B_6" => [
                'answer' => $this->answerArray("B_6", 7)
            ],
            "B_6_1" => [
                'answer' => data_get($input, "B_6_1", '')
            ],
            "B_7" => [
                'answer' => data_get($input, "B_7", '')
            ],
            "B_7_1" => [
                'answer' => data_get($input, "B_7_1", '')
            ],
            "B_7_2" => [
                'answer' => data_get($input, "B_7_2", '')
            ],
            "B_8" => [
                'answer' => data_get($input, "B_8", '')
            ],
            "B_9" => [
                'answer' => data_get($input, "B_9", '')
            ],
            "B_10" => [
                'answer' => data_get($input, "B_10", '')
            ],
            "B_10_1" => [
                'answer' => data_get($input, "B_10_1", '')
            ],
            "B_11" => [
                'answer' => data_get($input, "B_11", '')
            ],
            "B_11_1" => [
                'answer' => data_get($input, "B_11_1", '')
            ],
            "B_11_2" => [
                'answer' => data_get($input, "B_11_2", '')
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
