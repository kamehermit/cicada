<?php

namespace App\Http\Middleware;

use Closure;
use App\BanUser;
use Auth;
use Carbon\Carbon;

class BanUserMiddleware
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
        $check = BanUser::where('user_id',\Auth::user()->id)->orderBy('timestamp','desc')->get(['timestamp','type_id'])->first();
        if($check){
            $cur_time = Carbon::now('Asia/Kolkata');
            $ban_time = Carbon::createFromFormat('Y-m-d H:i:s', $check->timestamp, 'Asia/Kolkata');
            if($check->type_id==1){
                if($cur_time->diffInMinutes($ban_time)<30)
                    return \Redirect::route('banned');
            }
            else if($check->type_id==2){
                if($cur_time->diffInHours($ban_time)<1)
                    return \Redirect::route('banned');
            }
            else{
                return \Redirect::route('banned');   
            }
        }
        return $next($request);
    }
}
