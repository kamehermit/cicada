<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Page;
use Auth;
use Carbon\Carbon;

class TrackUserMiddleware
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
        $id = User::where('id',\Auth::user()->id)->get(['page_id'])->first();
        $page_id = intval($request->page_id);
        $flag = $request->flag;
        $level = $request->level;
        if(!(strcasecmp($flag,'true'))){
            if(!(strcasecmp($level,'level3'))){
                User::where('id',Auth::user()->id)->update(['page_id'=>2,'timestamp'=>Carbon::now('Asia/Kolkata')]);
                $url = Page::where('id',intval($id->page_id)+1)->get(['url'])->first();
                return redirect($url->url);    
            }
            else{
                return \Redirect::route('notlevel2');
            }   
        }
        if(!(strcasecmp($level,'level3'))){
            if(!(strcasecmp($flag,'true'))){
                User::where('id',Auth::user()->id)->update(['page_id'=>2,'timestamp'=>Carbon::now('Asia/Kolkata')]);
                $url = Page::where('id',intval($id->page_id)+1)->get(['url'])->first();
                return redirect($url->url);    
            }
            else{
                return \Redirect::route('notlevel2');
            }
            
        }
        if(intval($id->page_id) != $page_id-1){
            $url = Page::where('id',intval($id->page_id)+1)->get(['url'])->first();
            return redirect($url->url);
        }

        return $next($request);
    }
}
