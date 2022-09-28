<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;

class Page4Controller extends Controller
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

    public function page4(Request $request)
    {
        $input = $request->except(['_token']);
        $data = [
            "C_1" => [
                'answer' => data_get($input, "C_1", ''),
            ],
            "C_1_1" => [
                'answer' => $this->answerArray("C_1_1", 14),
            ],
            "C_1_2" => [
                'answer' => data_get($input, "C_1_2", ''),
            ],
            "C_2" => [
                'answer' => data_get($input, "C_2", ''),
            ],
            "C_2_1" => [
                'answer' => $this->answerArray("C_2_1", 8),
            ],
            "C_2_2" => [
                'answer' => data_get($input, "C_2_2", ''),
            ],
            "C_3" => [
                'answer' => data_get($input, "C_3", ''),
            ],
            "C_3_1" => [
                'answer' => $this->answerArray("C_3_1", 6),
            ],
            "C_3_2" => [
                'answer' => data_get($input, "C_3_2", ''),
            ],
            "C_3_3" => [
                'answer' => data_get($input, "C_3_3", ''),
            ],
            "C_3_4" => [
                'answer' => data_get($input, "C_3_4", ''),
            ],
            "C_3_5" => [
                'answer' => data_get($input, "C_3_5", ''),
            ],
            "C_3_6" => [
                'answer' => data_get($input, "C_3_6", ''),
            ],
            "C_3_7" => [
                'answer' => data_get($input, "C_3_7", ''),
            ],
            "C_3_8" => [
                'answer' => data_get($input, "C_3_8", ''),
            ],
            "C_4" => [
                'answer' => data_get($input, "C_4", ''),
            ],
            "C_4_1" => [
                'answer' => $this->answerArray("C_4_1", 9),
            ],
            "C_4_2" => [
                'answer' => data_get($input, "C_4_2", ''),
            ],
            "C_4_3" => [
                'answer' =>  data_get($input, "C_4_3", ''),
            ],
            "C_4_4" => [
                'answer' => data_get($input, "C_4_4", ''),
            ],
        ];
        Result::updateOrCreate(
            ['user_id' => auth()->id()],
            ['page3' => $data]
        );
        $maxPage = $request->session()->get('maxPage');
        if ($maxPage < 4) {
            $maxPage = $request->session()->put('maxPage', '3');
        }

        if (data_get($input, "save-return", '') == 'return') {
            session()->flash('msg', '儲存成功');
            return redirect()->back();
        } 

        return redirect('/page4');
    }
}
