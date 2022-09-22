<?php

namespace App\Exports;

use App\Result;
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
    }

    public function headings(): array
    {
        $first = Result::first()->result;
        return array_keys($first);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $resultModel = Result::select('result');
        if (!empty($this->start)) {
            $resultModel = $resultModel->whereDate('created_at', '>=', $this->start);
        }
        if (!empty($this->end)) {
            $resultModel = $resultModel->whereDate('created_at', '<=', $this->end);
        }
        $resultModel = $resultModel->get();
        $data = [];
        foreach ($resultModel as $v) {
            $data[] = collect($v->result);
        }
        return collect($data);

    }
}
