<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class FinishController extends Controller
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

    public function index(Request $request)
    {
        $input = $request->except(['_token']);
        $data = [
            'E_1' => [
                'answer' => data_get($input, 'E_1', ''),
            ],
            'E_2' => [
                'answer' => data_get($input, 'E_2', ''),
            ],
            'E_3' => [
                'answer' => data_get($input, 'E_3', ''),
            ],
            'E_3_1' => [
                'answer' => data_get($input, 'E_3_1', ''),
            ],
            'E_4' => [
                'answer' => data_get($input, 'E_4', ''),
            ],
            'E_5' => [
                'answer' => data_get($input, 'E_5', ''),
            ],
            'E_5_1' => [
                'answer' => data_get($input, 'E_5_1', ''),
            ],
            'E_5_2' => [
                'answer' => data_get($input, 'E_5_2', ''),
            ],
            'E_5_3' => [
                'answer' => data_get($input, 'E_5_3', ''),
            ],
            'E_5_4' => [
                'answer' => data_get($input, 'E_5_4', ''),
            ],
            'E_5_5' => [
                'answer' => data_get($input, 'E_5_5', ''),
            ],
            'E_6' => [
                'answer' => $this->answerArray('E_6', 8),
            ],
            'E_6_1' => [
                'answer' => data_get($input, 'E_6_1', ''),
            ],
            'E_6_2' => [
                'answer' => data_get($input, 'E_6_2', ''),
            ],
            'E_6_3' => [
                'answer' => data_get($input, 'E_6_3', ''),
            ],
            'E_6_4' => [
                'answer' => data_get($input, 'E_6_4', ''),
            ],
            'E_6_5' => [
                'answer' => data_get($input, 'E_6_5', ''),
            ],
            'E_6_6' => [
                'answer' => data_get($input, 'E_6_6', ''),
            ],
            'E_6_7' => [
                'answer' => data_get($input, 'E_6_7', ''),
            ],
            'E_6_8' => [
                'answer' => data_get($input, 'E_6_8', ''),
            ],
            'E_6_9' => [
                'answer' => data_get($input, 'E_6_9', ''),
            ],
            'E_7' => [
                'answer' => data_get($input, 'E_7', ''),
            ],
            'E_7_1' => [
                'answer' => $this->answerArray('E_7_1', 6),
            ],
            'E_7_2' => [
                'answer' => data_get($input, 'E_7_2', ''),
            ],
            'E_7_3' => [
                'answer' => data_get($input, 'E_7_3', ''),
            ],
        ];
        

        Result::updateOrCreate(
            ['user_id' => auth()->id()],
            ['page5' => $data]
        );

        $userResult = auth()->user()->results;
        $newArray = Arr::collapse([
            $userResult->page1,
            $userResult->page2,
            $userResult->page3,
            $userResult->page4,
            $userResult->page5,
        ]);
        // 整理資料 $newRes返回一維數組
        $newRes = [];
        foreach ($newArray as $k => $v) {
            if (is_string($v)) {
                $newRes[$k] = $v;
            } else {
                if (is_array($v['answer'])) {
                    foreach ($v['answer'] as $k1 => $v1) {
                        $newRes[$k1] = $v1;
                    }
                } else {
                    $newRes[$k] = $v['answer'];
                }
            }
        }
        $userResult->result = $newRes;
        $userResult->save();

        return redirect('/finish');
    }
}
