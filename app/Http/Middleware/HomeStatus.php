<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class HomeStatus
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
        $system = DB::table('system')->first();
        if($system->status == 1){
            echo '站点暂时关闭使用！';exit;
            return redirect('home/message');
        }
        return $next($request);
    }
}
