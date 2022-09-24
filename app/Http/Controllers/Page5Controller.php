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
            'C-9' => [
                'answer' => data_get($input, 'C-9', ''),
            ],
            'C-9-A' => [
                'answer' => data_get($input, 'C-9-A', ''),
            ],
            'C-9-B' => [
                'answer' => data_get($input, 'C-9-B', ''),
            ],
            'C-9-C' => [
                'answer' => data_get($input, 'C-9-C', ''),
            ],
            'C-10_1' => [
                'answer' => data_get($input, 'C-10_1', ''),
            ],
            'C-10_1-A' => [
                'answer' => data_get($input, 'C-10_1-A', ''),
            ],
            'C-10_1-B' => [
                'answer' => data_get($input, 'C-10_1-B', ''),
            ],
            'C-10_1-C' => [
                'answer' => data_get($input, 'C-10_1-C', ''),
            ],
            'C-10_1-D' => [
                'answer' => $this->answerArray('C-10_1-D', 7),
            ],
            'C-10_1-E' => [
                'answer' => data_get($input, 'C-10_1-E', ''),
            ],
            'C-10_1-F' => [
                'answer' => data_get($input, 'C-10_1-F', ''),
            ],
            'C-10_1-G' => [
                'answer' => data_get($input, 'C-10_1-G', ''),
            ],
            'C-10_1-H' => [
                'answer' => $this->answerArray('C-10_1-H', 4),
            ],
            'C-10_1-I' => [
                'answer' => data_get($input, 'C-10_1-I', ''),
            ],
            'C-10_1-J' => [
                'answer' => data_get($input, 'C-10_1-J', ''),
            ],
            'C-10_2' => [
                'answer' => data_get($input, 'C-10_2', ''),
            ],
            'C-10_2-A' => [
                'answer' => data_get($input, 'C-10_2-A', ''),
            ],
            'C-10_2-B' => [
                'answer' => $this->answerArray('C-10_2-B', 6),
            ],
            'C-10_2-C' => [
                'answer' => data_get($input, 'C-10_2-C', ''),
            ],
            'C-10_2-D' => [
                'answer' => data_get($input, 'C-10_2-D', ''),
            ],
            'C-10_2-E' => [
                'answer' => data_get($input, 'C-10_2-E', ''),
            ],
            'C-10_3' => [
                'answer' => data_get($input, 'C-10_3', ''),
            ],
            'C-10_4' => [
                'answer' => data_get($input, 'C-10_4', ''),
            ],
            'C-10_4-A' => [
                'answer' => data_get($input, 'C-10_4-A', ''),
            ],
            'C-10_5' => [
                'answer' => data_get($input, 'C-10_5', ''),
            ],
            'C-10_5-A' => [
                'answer' => data_get($input, 'C-10_5-A', ''),
            ],
            'C-10_5-B' => [
                'answer' => data_get($input, 'C-10_5-B', ''),
            ],
            'C-10_6' => [
                'answer' => data_get($input, 'C-10_6', ''),
            ],
            'C-10_6-A' => [
                'answer' => data_get($input, 'C-10_6-A', ''),
            ],
            'C-10_6-B' => [
                'answer' => data_get($input, 'C-10_6-B', ''),
            ],
            'C-10_6-C' => [
                'answer' => $this->answerArray('C-10_6-C', 3),
            ],
            'C-10_6-D' => [
                'answer' => data_get($input, 'C-10_6-D', ''),
            ],
            'C-11' => [
                'answer' => data_get($input, 'C-11', ''),
            ],
            'C-11-A' => [
                'answer' => data_get($input, 'C-11-A', ''),
            ],
            'C-12' => [
                'answer' => data_get($input, 'C-12', ''),
            ],
            'C-12-A' => [
                'answer' => data_get($input, 'C-12-A', ''),
            ],
            'C-12-B' => [
                'answer' => data_get($input, 'C-12-B', ''),
            ],
            'C-12-C' => [
                'answer' => data_get($input, 'C-12-C', ''),
            ],
            'C-12-D' => [
                'answer' => data_get($input, 'C-12-D', ''),
            ],
            'C-12-E' => [
                'answer' => data_get($input, 'C-12-E', ''),
            ],
            'C-12-F' => [
                'answer' => data_get($input, 'C-12-F', ''),
            ],
            'C-12-G' => [
                'answer' => $this->answerArray('C-12-G', 6),
            ],
            'C-12-H' => [
                'answer' => $this->answerArray('C-12-H', 2),
            ],
            'C-12-I' => [
                'answer' => data_get($input, 'C-12-I', ''),
            ],
            'C-12-J' => [
                'answer' => data_get($input, 'C-12-J', ''),
            ],
            'C-13' => [
                'answer' => data_get($input, 'C-13', ''),
            ],
            'C-13-A' => [
                'answer' => data_get($input, 'C-13-A', ''),
            ],
            'C-13-B' => [
                'answer' => data_get($input, 'C-13-B', ''),
            ],
            'C-13-C' => [
                'answer' => data_get($input, 'C-13-C', ''),
            ],
            'C-13-D' => [
                'answer' => $this->answerArray('C-13-D', 3),
            ],
            'C-13-E' => [
                'answer' => data_get($input, 'C-13-E', ''),
            ],
            'C-13-F' => [
                'answer' => data_get($input, 'C-13-F', ''),
            ],
            'C-14' => [
                'answer' => data_get($input, 'C-14', ''),
            ],
            'C-14-A' => [
                'answer' => data_get($input, 'C-14-A', ''),
            ],
            'C-14-B' => [
                'answer' => data_get($input, 'C-14-B', ''),
            ],
            'C-15' => [
                'answer' => data_get($input, 'C-15', ''),
            ],
            'C-15-A' => [
                'answer' => $this->answerArray('C-15-A', 7),
            ],
            'C-15-B' => [
                'answer' => data_get($input, 'C-15-B', ''),
            ],
            'C-16' => [
                'answer' => data_get($input, 'C-16', ''),
            ],
            'C-16-A' => [
                'answer' => data_get($input, 'C-16-A', ''),
            ],
            'C-16-B' => [
                'answer' => data_get($input, 'C-16-B', ''),
            ],
            'C-16-C' => [
                'answer' => data_get($input, 'C-16-C', ''),
            ],
            'C-16-D' => [
                'answer' => $this->answerArray('C-16-D', 7),
            ],
            'C-16-E' => [
                'answer' => $this->answerArray('C-16-E', 4),
            ],
            'C-16-F' => [
                'answer' => data_get($input, 'C-16-F', ''),
            ],
            'C-16-G' => [
                'answer' => data_get($input, 'C-16-G', ''),
            ],
            'C-16-H' => [
                'answer' => data_get($input, 'C-16-H', ''),
            ],
            'C-16-I' => [
                'answer' => data_get($input, 'C-16-I', ''),
            ],
            'C-17' => [
                'answer' => data_get($input, 'C-17', ''),
            ],
            'C-17-A' => [
                'answer' => data_get($input, 'C-17-A', ''),
            ],
            'C-17-B' => [
                'answer' => data_get($input, 'C-17-B', ''),
            ],
            'C-17-C' => [
                'answer' => data_get($input, 'C-17-C', ''),
            ],
            'C-17-D' => [
                'answer' => data_get($input, 'C-17-D', ''),
            ],
            'C-18' => [
                'answer' => data_get($input, 'C-18', ''),
            ],
            'C-18-A' => [
                'answer' => $this->answerArray('C-18-A', 4),
            ],
            'C-18-B' => [
                'answer' => data_get($input, 'C-18-B', ''),
            ],
            'C-18-C' => [
                'answer' => data_get($input, 'C-18-C', ''),
            ],
            'C-18-D' => [
                'answer' => data_get($input, 'C-18-D', ''),
            ],
            'C-18-E' => [
                'answer' => data_get($input, 'C-18-E', ''),
            ],
            'C-19' => [
                'answer' => data_get($input, 'C-19', ''),
            ],
            'C-19-A' => [
                'answer' => data_get($input, 'C-19-A', ''),
            ],
            'C-19-B' => [
                'answer' => $this->answerArray('C-19-B', 2),
            ],
            'C-19-C' => [
                'answer' => $this->answerArray('C-19-C', 5),
            ],
            'C-19-D' => [
                'answer' => data_get($input, 'C-19-D', ''),
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
