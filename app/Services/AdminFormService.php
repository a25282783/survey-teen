<?php

namespace App\Services;

class AdminFormService
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('admin.test', ['aaa' => $this->data['test']]);
    }
}
