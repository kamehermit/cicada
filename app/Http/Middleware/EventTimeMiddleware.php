<?php

namespace App\Http\Middleware;

use Closure;
use App\EventSchedule;
use Carbon\Carbon;

class EventTimeMiddleware
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
        $data = EventSchedule::get()->first();
        $start_time = Carbon::createFromFormat('Y-m-d H:i:s', $data->start, 'Asia/Kolkata');
        $end_time = Carbon::createFromFormat('Y-m-d H:i:s', $data->end, 'Asia/Kolkata');
        $cur_time = Carbon::now('Asia/Kolkata');
        if($cur_time->lt($start_time) || $cur_time->gte($end_time)){
            return redirect('dashboard');
        }
        return $next($request);
    }
}
