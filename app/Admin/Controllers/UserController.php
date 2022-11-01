<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\User\ImportUser;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '使用者';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->paginate(30);
        $grid->column('name', '帳號');
        $grid->column('password_uncrypt', '密碼');
        // $grid->column('survey_name', '填表人');
        $grid->column('depart', '公司名稱/姓名');
        $grid->column('serial', '樣本編號');

        // 將匯入操作加入到表格的工具條中
        $grid->tools(function (Grid\Tools $tools) {
            $tools->append(new ImportUser());
        });

        $grid->filter(function ($filter) {
            // 在这里添加字段过滤器
            $filter->like('name', '帳號');
            $filter->like('depart', '公司名稱/姓名');
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
        $form = new Form(new User());

        $form->text('name', '帳號')->rules(function ($form) {
            // 如果不是编辑状态，则添加字段唯一验证
            if (!$id = $form->model()->id) {
                return 'unique:users,name';
            }
        })->required();
        $form->password('password', '密碼')->rules('confirmed|required')
            ->default(function ($form) {
                return $form->model()->password;
            });
        $form->password('password_confirmation', '確認密碼')->rules('required')
            ->default(function ($form) {
                return $form->model()->password;
            });
        // $form->text('survey_name', '填表人');
        $form->text('depart', '公司名稱/姓名');
        $form->text('serial', '樣本編號');
        $form->hidden('password_uncrypt');
        $form->ignore(['password_confirmation']);
        $form->saving(function (Form $form) {
            $form->password_uncrypt = $form->password;
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = bcrypt($form->password);
            }
        });

        return $form;
    }
}
