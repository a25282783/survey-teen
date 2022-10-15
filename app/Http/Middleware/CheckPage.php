<?php

namespace App\Http\Middleware;

use Closure;

class CheckPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //本機測試用
        if (request()->getHost() == 'localhost') {
            return $next($request);
        }
        $userResult = auth()->user()->results;
        //作答完畢顯示感謝頁
        if (!$userResult) {
            return redirect('/page1');
        }
        if ($userResult->result) {
            return response()->view('finish');
        }
        $maxPage = $request->session()->get('maxPage');
        $routePage = ltrim($request->path(), 'page');

        if ( ($maxPage + 1 ) < $routePage ) {
            if ($maxPage == 0) {
                $maxPage = '1';
            }
            return redirect('/page' . ($maxPage + 1 ));
        }
        return $next($request);
    }
}
