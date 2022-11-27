<?php

namespace App\Exports;

use App\Result;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResultsExport implements FromCollection, WithHeadings
{
    public $start;
    public $end;

    public function __construct($start = null, $end = null)
    {
        $this->start = $start;
        $this->end = $end;
        $this->result = $this->getFormatResult();
    }

    public function headings(): array
    {
        // $first = Result::first()->result;
        // return array_keys($first);
        return $this->result[0]->keys()->all();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        $data = $this->result;
        return collect($data);

    }

    public function getFormatResult()
    {
        $resultModel = Result::select('page1','page2','page3','page4','page5');
        if (!empty($this->start)) {
            $resultModel = $resultModel->whereDate('created_at', '>=', $this->start);
        }
        if (!empty($this->end)) {
            $resultModel = $resultModel->whereDate('created_at', '<=', $this->end);
        }
        $resultModel = $resultModel->get()->toArray();

        $data = [];
        foreach ($resultModel as $result) {
            // page1
            $result['page1']['A_2_1_4other']['answer'] = $result['page1']['A_2_1_3']['answer'];
            unset($result['page1']['A_2_1_3']);
            // page1
            $result['page1']['A_2_2_3other']['answer'] = $result['page1']['A_2_2_1']['answer'];
            unset($result['page1']['A_2_2_1']);
            // page1
            $result['page1']['A_2_3_8other']['answer'] = $result['page1']['A_2_3_1']['answer'];
            unset($result['page1']['A_2_3_1']);
            // page2
            $result['page2']['B_2_11other']['answer'] = $result['page2']['B_2_1']['answer'];
            unset($result['page2']['B_2_1']);
            // page2
            $result['page2']['B_6_6other']['answer'] = $result['page2']['B_6_1']['answer'];
            unset($result['page2']['B_6_1']);
            // page4
            $result['page4']['D_5_12other']['answer'] = $result['page4']['D_5_1']['answer'];
            unset($result['page4']['D_5_1']);

            $newArray = Arr::collapse([
                $result['page1'],
                $result['page2'],
                $result['page3'],
                $result['page4'],
                $result['page5']
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
            $data[] = collect($newRes)->sortKeys();
        }
        return $data;
    }
}
