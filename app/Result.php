<?php

namespace App;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use DefaultDatetimeFormat;

    protected $guarded = [];
    protected $casts = [
        'result' => 'array',
        'page1' => 'array',
        'page2' => 'array',
        'page3' => 'array',
        'page4' => 'array',
        'page5' => 'array',
        'page6' => 'array',
    ];

    protected static function booted()
    {
        if (request()->is('admin/*')) {
            static::addGlobalScope('result', function (Builder $builder) {
                $builder->whereNotNull('result')->where('result', '<>', '');
            });
        }

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
