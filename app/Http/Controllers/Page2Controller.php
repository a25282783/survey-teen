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


    public function page2(Request $request)
    {
        $input = $request->except(['_token']);
        $data = [
            '帳號' => auth()->user()->name,
            '密碼' => auth()->user()->password_uncrypt,
            '公司名稱' => $input['company']??'',
            '樣本編號' => $input['serial']??'',
            '填表人' => $input['name']??'',
            '部門' => $input['depart']??'',
            '電話' => $input['phone']??'',
            '傳真' => $input['tax']??'',
            '職稱' => $input['job']??'',
            'email' => $input['email']??'',
            'A_1' => [
                'answer' => data_get($input, "A_1", ''),
            ],
            "A_2" => [
                'answer' => $this->answerArray("A_2", 3),
            ],
            "A_2_1" => [
                'answer' => $this->answerArray("A_2_1", 4),
            ],
            "A_2_1_1" => [
                'answer' => $this->answerArray("A_2_1_1", 2),
            ],
            "A_2_1_2" => [
                'answer' => $this->answerArray("A_2_1_2", 2),
            ],
            "A_2_1_3" => [
                'answer' => data_get($input, "A_2_1_3", ''),
            ],
            "A_2_2" => [
                'answer' => $this->answerArray("A_2_2", 3),
            ],
            "A_2_2_1" => [
                'answer' => data_get($input, "A_2_2_1", ''),
            ],
            "A_2_3" => [
                'answer' => $this->answerArray("A_2_3", 8),
            ],
            "A_2_3_1" => [
                'answer' => data_get($input, "A_2_3_1", ''),
            ],
            "A_3" => [
                'answer' => data_get($input, "A_3", ''),
            ],
            "A_3_1" => [
                'answer' => $this->answerArray("A_3_1", 4),
            ],
            "A_3_2" => [
                'answer' =>  data_get($input, "A_3_2", ''),
            ],
            "A_3_4" => [
                'answer' => data_get($input, "A_3_4", ''),
            ],
            "A_3_3" => [
                'answer' => $this->answerArray("A_3_3", 9),
            ],
            "A_3_5" => [
                'answer' => data_get($input, "A_3_5", ''),
            ],
            "A_4" => [
                'answer' => data_get($input, "A_4", ''),
            ],
            "A_4_1" => [
                'answer' => $this->answerArray("A_4_1", 16),
            ],
            "A_4_2" => [
                'answer' => data_get($input, "A_4_2", ''),
            ],
            "A_4_3" => [
                'answer' => data_get($input, "A_4_3", ''),
            ],
            "A_4_4" => [
                'answer' => data_get($input, "A_4_4", ''),
            ],
            "A_5" => [
                'answer' => data_get($input, "A_5", ''),
            ],
            "A_6" => [
                'answer' => data_get($input, "A_6", ''),
            ],
            "A_6_1" => [
                'answer' => data_get($input, "A_6_1", ''),
            ],
            "A_6_2" => [
                'answer' => data_get($input, "A_6_2", ''),
            ],
            "A_6_3" => [
                'answer' => data_get($input, "A_6_3", ''),
            ],
            "A_7" => [
                'answer' => data_get($input, "A_7", ''),
            ],
            "A_7_1" => [
                'answer' => data_get($input, "A_7_1", ''),
            ],
            "A_7_2" => [
                'answer' => data_get($input, "A_7_2", ''),
            ],
            "A_8" => [
                'answer' => data_get($input, "A_8", ''),
            ],
            "A_8_1" => [
                'answer' => $this->answerArray("A_8_1", 8),
            ],
            "A_8_2" => [
                'answer' => data_get($input, "A_8_2", ''),
            ],
            "A_8_3" => [
                'answer' => data_get($input, "A_8_3", ''),
            ],
            "A_8_4" => [
                'answer' => data_get($input, "A_8_4", ''),
            ],
            "A_9" => [
                'answer' => data_get($input, "A_9", ''),
            ],
            "A_9_1" => [
                'answer' => $this->answerArray("A_9_1", 11),
            ],
            "A_9_2" => [
                'answer' => data_get($input, "A_9_2", ''),
            ],
            "A_10" => [
                'answer' => data_get($input, "A_10", ''),
            ],
            "A_10_1" => [
                'answer' => data_get($input, "A_10_1", ''),
            ],
            "A_11" => [
                'answer' => data_get($input, "A_11", ''),
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
