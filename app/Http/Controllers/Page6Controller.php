<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;

class Page6Controller extends Controller
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

    public function page6(Request $request)
    {
        $input = $request->except(['_token']);
        $data = [
            'D-1' => [
                'answer' => data_get($input, 'D-1', ''),
            ],
            'D-1-A' => [
                'answer' => data_get($input, 'D-1-A', ''),
            ],
            'D-1-B' => [
                'answer' => data_get($input, 'D-1-B', ''),
            ],
            'D-1-C' => [
                'answer' => data_get($input, 'D-1-C', ''),
            ],
            'D-1-D' => [
                'answer' => $this->answerArray('D-1-D', 3),
            ],
            'D-1-E' => [
                'answer' => data_get($input, 'D-1-E', ''),
            ],
            'D-1-F' => [
                'answer' => data_get($input, 'D-1-F', ''),
            ],
            'D-1-G' => [
                'answer' => data_get($input, 'D-1-G', ''),
            ],
            'D-2' => [
                'answer' => data_get($input, 'D-2', ''),
            ],
            'D-2-A' => [
                'answer' => data_get($input, 'D-2-A', ''),
            ],
            'D-3' => [
                'answer' => $this->answerArray('D-3', 6),
            ],
            'D-3-A' => [
                'answer' => data_get($input, 'D-3-A', ''),
            ],
            'D-4' => [
                'answer' => data_get($input, 'D-4', ''),
            ],
            'D-4-A' => [
                'answer' => data_get($input, 'D-4-A', ''),
            ],
            'D-4-B' => [
                'answer' => $this->answerArray('D-4-B', 3),
            ],
            'D-4-C' => [
                'answer' => data_get($input, 'D-4-C', ''),
            ],
            'D-4-D' => [
                'answer' => data_get($input, 'D-4-D', ''),
            ],
            'D-5' => [
                'answer' => data_get($input, 'D-5', ''),
            ],
            'D-5-A' => [
                'answer' => data_get($input, 'D-5-A', ''),
            ],
            'D-5-B' => [
                'answer' => data_get($input, 'D-5-B', ''),
            ],
        ];
        Result::updateOrCreate(
            ['user_id' => auth()->id()],
            ['page5' => $data]
        );
        $maxPage = $request->session()->get('maxPage');
        if ($maxPage < 6) {
            $maxPage = $request->session()->put('maxPage', '5');
        }

        if (data_get($input, "save-return", '') == 'return') {
            session()->flash('msg', '儲存成功');
            return redirect()->back();
        } 

        return redirect('/page6');
    }
}
