<?php

namespace App\Http\Middleware;

use Closure;

class ContinueWrite
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
        // if (request()->getHost() == 'localhost') {
        //     return $next($request);
        // }

        $userResult = auth()->user()->results;
        if (!$userResult) {
            $request->session()->put('maxPage', '0');
            return redirect('/page1');
        }
        if ($userResult->result) {
            return response()->view('finish');
        }
        //判斷上次做到哪
        if ($userResult->page4 && !$userResult->page5) {
            $request->session()->put('maxPage', '4');
            return redirect('/page5');
        } elseif ($userResult->page3 && !$userResult->page4) {
            $request->session()->put('maxPage', '3');
            return redirect('/page4');
        } elseif ($userResult->page2 && !$userResult->page3) {
            $request->session()->put('maxPage', '2');
            return redirect('/page3');
        } elseif ($userResult->page1 && !$userResult->page2) {
            $request->session()->put('maxPage', '1');
            return redirect('/page2');
        } elseif (!$userResult->page1) {
            $request->session()->put('maxPage', '0');
            return redirect('/page1');
        }
        return $next($request);
    }
}
