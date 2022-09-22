<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Results\ExportResult;
use App\Result;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class ResultController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '調查結果';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Result());

        $grid->model()->orderBy('id', 'desc');
        $grid->column('user.name', '帳號');
        $grid->column('created_at', '創建日期');

        // 禁止操作
        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->actions(function (Grid\Displayers\Actions $actions) {
            $actions->disableView();
        });
        // $grid->exporter(new ResultsExporter());
        $grid->tools(function (Grid\Tools $tools) {
            $tools->append(new ExportResult());
        });

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Result());

        $form->text('user.name', '帳號')->readonly();

        return $form;
    }
}
