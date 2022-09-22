<?php

namespace App\Admin\Actions\User;

use App\Imports\UsersImport;
use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportUser extends Action
{
    protected $selector = '.import-user';

    public function handle(Request $request)
    {
        // 下面的程式碼獲取到上傳的檔案，然後使用`maatwebsite/excel`等包來處理上傳你的檔案，儲存到資料庫
        $request->file('file');

        $import = new UsersImport();
        // $import->import($request->file('file'));
        Excel::import($import, $request->file('file'));
        return $this->response()->success('匯入完成！')->refresh();
    }

    public function form()
    {
        $this->file('file', '請選擇檔案');
    }

    public function html()
    {
        return <<<HTML
        <a class="btn btn-sm btn-default import-user">匯入資料</a>
        HTML;
    }
}
