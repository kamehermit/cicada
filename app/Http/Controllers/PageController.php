<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\EventSchedule;
use Carbon\Carbon;

class PageController extends Controller
{
    public function index(){
        $data = EventSchedule::get()->first();
        $start_time = Carbon::createFromFormat('Y-m-d H:i:s', $data->start, 'Asia/Kolkata');
        $end_time = Carbon::createFromFormat('Y-m-d H:i:s', $data->end, 'Asia/Kolkata');
        $cur_time = Carbon::now('Asia/Kolkata');
        if($cur_time->lt($start_time) || $cur_time->gte($end_time)){
            $date = $start_time->format('Y-m-d');
            $time = $start_time->format('H:i:s');
            $start = $date."T".$time;
            return view('pages.index',['start_time'=>$start,'tagline'=>'The Tech Hunt will start in...']);
        }
        else{
            $date = $end_time->format('Y-m-d');
            $time = $end_time->format('H:i:s');
            $end = $date."T".$time;
            return view('pages.index',['start_time'=>$end,'tagline'=>'The Tech Hunt will end in...']);
        }
    }

    public function dashboard(){
        $data = EventSchedule::get()->first();
        $start_time = Carbon::createFromFormat('Y-m-d H:i:s', $data->start, 'Asia/Kolkata');
        $end_time = Carbon::createFromFormat('Y-m-d H:i:s', $data->end, 'Asia/Kolkata');
        $cur_time = Carbon::now('Asia/Kolkata');
        if($cur_time->lt($start_time) || $cur_time->gte($end_time)){
            $date = $start_time->format('Y-m-d');
            $time = $start_time->format('H:i:s');
            $start = $date."T".$time;
            return view('pages.dashboard',['start_time'=>$start,'tagline'=>'...untill the Tech Hunt begins']);
        }
        else{
            $date = $end_time->format('Y-m-d');
            $time = $end_time->format('H:i:s');
            $end = $date."T".$time;
            return view('pages.dashboard',['start_time'=>$end,'tagline'=>'...untill the Tech Hunt endss']);
        }
    	return view('pages.dashboard');
    }

    public function terminal(){
    	return view('pages.terminal');
    }

    public function level1($flag,$level){
        if(!(strcasecmp($flag,'true') && strcasecmp($level,'level2'))){
            return "This is level2";
        }
        else{
            return "nope, still at level1";
        }
    }

    public function test(){
    	//date_default_timezone_set('Asia/Kolkata');
    	$data = EventSchedule::get()->first();
    	$event_time = Carbon::createFromFormat('Y-m-d H:i:s', $data->start, 'Asia/Kolkata');
    	$cur_time = Carbon::now('Asia/Kolkata');
    if($cur_time->gte($event_time)){
    		return "plata";
    	}else{
    		return "plomo";
    	}
        return response()->json(['cur_date'=>$cur_time,'event_date'=>$event_time]);

    }
}
