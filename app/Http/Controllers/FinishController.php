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

    public function index(Request $request)
    {
        $input = $request->except(['_token']);
        $tag = [
            'E-1-1', 'E-1-2', 'E-1-3', 'E-1-4', 'E-1-5', 'E-2', 'E-2-A',
            'E-3', 'E-3-A',
        ];
        for ($i = 1; $i < 12; $i++) {
            $tag[] = 'E-4-' . $i;
        }
        for ($i = 1; $i < 12; $i++) {
            $tag[] = 'E-5-' . $i;
        }
        for ($i = 1; $i < 16; $i++) {
            $tag[] = 'E-6-' . $i;
        }
        $data = [
        ];
        foreach ($tag as $value) {
            $data[$value] = [
                'answer' => data_get($input, $value, ''),
            ];
        }

        Result::updateOrCreate(
            ['user_id' => auth()->id()],
            ['page6' => $data]
        );

        $userResult = auth()->user()->results;
        $newArray = Arr::collapse([
            $userResult->page1,
            $userResult->page2,
            $userResult->page3,
            $userResult->page4,
            $userResult->page5,
            $userResult->page6,
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
