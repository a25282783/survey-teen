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
            "C-1" => [
                'answer' => data_get($input, "C-1", ''),
            ],
            "C-1-A" => [
                'answer' => data_get($input, "C-1-A", ''),
            ],
            "C-1-B" => [
                'answer' => data_get($input, "C-1-B", ''),
            ],
            "C-1-C" => [
                'answer' => data_get($input, "C-1-C", ''),
            ],
            "C-1-D" => [
                'answer' => data_get($input, "C-1-D", ''),
            ],
            "C-1-E" => [
                'answer' => data_get($input, "C-1-E", ''),
            ],
            "C-1-F" => [
                'answer' => data_get($input, "C-1-F", ''),
            ],
            "C-1-G" => [
                'answer' => $this->answerArray("C-1-G", 3),
            ],
            "C-1-H" => [
                'answer' => data_get($input, "C-1-H", ''),
            ],
            "C-1-I" => [
                'answer' => data_get($input, "C-1-I", ''),
            ],
            "C-2" => [
                'answer' => data_get($input, "C-2", ''),
            ],
            "C-2-A" => [
                'answer' => $this->answerArray("C-2-A", 4),
            ],
            "C-2-B" => [
                'answer' => data_get($input, "C-2-B", ''),
            ],
            "C-3" => [
                'answer' => data_get($input, "C-3", ''),
            ],
            "C-3-A" => [
                'answer' => data_get($input, "C-3-A", ''),
            ],
            "C-3-B" => [
                'answer' => data_get($input, "C-3-B", ''),
            ],
            'C-3-C' => [
                'answer' => $this->answerArray('C-3-C', 3),
            ],
            "C-3-D" => [
                'answer' => data_get($input, "C-3-D", ''),
            ],
            "C-3-E" => [
                'answer' => data_get($input, "C-3-E", ''),
            ],
            "C-4_1" => [
                'answer' => data_get($input, "C-4_1", ''),
            ],
            "C-4_1-A" => [
                'answer' => data_get($input, "C-4_1-A", ''),
            ],
            "C-4_1-B" => [
                'answer' => data_get($input, "C-4_1-B", ''),
            ],
            "C-4_1-C" => [
                'answer' => data_get($input, "C-4_1-C", ''),
            ],
            "C-4_1-D" => [
                'answer' => data_get($input, "C-4_1-D", ''),
            ],
            "C-4_1-E" => [
                'answer' => data_get($input, "C-4_1-E", ''),
            ],
            "C-4_1-F" => [
                'answer' => data_get($input, "C-4_1-F", ''),
            ],
            "C-4_1-G" => [
                'answer' => data_get($input, "C-4_1-G", ''),
            ],
            "C-4_1-H" => [
                'answer' => $this->answerArray("C-4_1-H", 4),
            ],
            "C-4_1-I" => [
                'answer' => data_get($input, "C-4_1-I", ''),
            ],
            "C-4_2" => [
                'answer' => data_get($input, "C-4_2", ''),
            ],
            "C-4_2-A" => [
                'answer' => data_get($input, "C-4_2-A", ''),
            ],
            "C-4_2-B" => [
                'answer' => data_get($input, "C-4_2-B", ''),
            ],
            "C-4_2-C" => [
                'answer' => $this->answerArray("C-4_2-C", 4),
            ],
            "C-4_2-D" => [
                'answer' => data_get($input, "C-4_2-D", ''),
            ],
            "C-4_2-E" => [
                'answer' => data_get($input, "C-4_2-E", ''),
            ],
            "C-5" => [
                'answer' => data_get($input, "C-5", ''),
            ],
            "C-5-A" => [
                'answer' => data_get($input, "C-5-A", ''),
            ],
            "C-5-B" => [
                'answer' => data_get($input, "C-5-B", ''),
            ],
            "C-5-C" => [
                'answer' => $this->answerArray("C-5-C", 3),
            ],
            "C-5-D" => [
                'answer' => data_get($input, "C-5-D", ''),
            ],
            "C-5-E" => [
                'answer' => data_get($input, "C-5-E", ''),
            ],
            "C-6" => [
                'answer' => data_get($input, "C-6", ''),
            ],
            "C-6-A" => [
                'answer' => data_get($input, "C-6-A", ''),
            ],
            "C-6-B" => [
                'answer' => data_get($input, "C-6-B", ''),
            ],
            "C-6-C" => [
                'answer' => data_get($input, "C-6-C", ''),
            ],
            "C-6-D" => [
                'answer' => $this->answerArray("C-6-D", 6),
            ],
            "C-6-E" => [
                'answer' => data_get($input, "C-6-E", ''),
            ],
            "C-6-F" => [
                'answer' => data_get($input, "C-6-F", ''),
            ],
            "C-6-G" => [
                'answer' => data_get($input, "C-6-G", ''),
            ],
            "C-6-H" => [
                'answer' => $this->answerArray("C-6-H", 5),
            ],
            "C-6-I" => [
                'answer' => data_get($input, "C-6-I", ''),
            ],
            "C-6-J" => [
                'answer' => data_get($input, "C-6-J", ''),
            ],
            "C-6-K" => [
                'answer' => data_get($input, "C-6-K", ''),
            ],
            "C-6-L" => [
                'answer' => data_get($input, "C-6-L", ''),
            ],
            "C-6-M" => [
                'answer' => data_get($input, "C-6-M", ''),
            ],
            "C-7" => [
                'answer' => data_get($input, "C-7", ''),
            ],
            "C-7-A" => [
                'answer' => data_get($input, "C-7-A", ''),
            ],
            "C-7-B" => [
                'answer' => data_get($input, "C-7-B", ''),
            ],
            "C-7-C" => [
                'answer' => data_get($input, "C-7-C", ''),
            ],
            "C-7-D" => [
                'answer' => data_get($input, "C-7-D", ''),
            ],
            "C-7-E" => [
                'answer' => data_get($input, "C-7-E", ''),
            ],
            "C-7-F" => [
                'answer' => data_get($input, "C-7-F", ''),
            ],
            "C-7-G" => [
                'answer' => data_get($input, "C-7-G", ''),
            ],
            "C-7-H" => [
                'answer' => $this->answerArray("C-7-H", 4),
            ],
            "C-7-I" => [
                'answer' => data_get($input, "C-7-I", ''),
            ],
            "C-8" => [
                'answer' => data_get($input, "C-8", ''),
            ],
            "C-8-A" => [
                'answer' => data_get($input, "C-8-A", ''),
            ],
            "C-8-B" => [
                'answer' => data_get($input, "C-8-B", ''),
            ],
            "C-8-C" => [
                'answer' => data_get($input, "C-8-C", ''),
            ],
            "C-8-D" => [
                'answer' => data_get($input, "C-8-D", ''),
            ],
            "C-8-E" => [
                'answer' => data_get($input, "C-8-E", ''),
            ],
            "C-8-F" => [
                'answer' => data_get($input, "C-8-F", ''),
            ],
            "C-8-G" => [
                'answer' => data_get($input, "C-8-G", ''),
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
