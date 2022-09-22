<?php

namespace App\Admin\Actions\Results;

use App\Exports\ResultsExport;
use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportResult extends Action
{
    protected $selector = '.export-result';

    public function handle(Request $request)
    {
        $start = $request->input('start_time');
        $end = $request->input('end_time');
        if (empty($start) && empty($end)) {
            $fileName = "Result_all.csv";
        } else {
            $fileName = "Result_$start-$end.csv";
        }

        try {
            Excel::store(new ResultsExport($start, $end), $fileName, 'export');
            return $this->response()->success('下載完成！')->download(config('app.url') . "/laravel-excel/$fileName");
        } catch (\Throwable $th) {
            return $this->response()->error($th->getMessage());
        }

    }

    public function form()
    {
        $this->date('start_time', '起始日期');
        $this->date('end_time', '結束日期');
    }

    public function html()
    {
        return <<<HTML
        <a class="btn btn-sm btn-default export-result">匯出資料</a>
        HTML;
    }
}
