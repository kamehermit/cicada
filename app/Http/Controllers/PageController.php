<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\EventSchedule;

class PageController extends Controller
{
    public function index(){
    	$time = EventSchedule::get()->first();
    	$start_time = $time->start;
    	$split_date = new \DateTime($start_time);
    	$date = $split_date->format('Y-m-d');
    	$time = $split_date->format('H:i:s');
    	$start = $date."T".$time;
    	return view('pages.index',['start_time'=>$start]);
    }

    public function dashboard(){
    	return view('pages.dashboard');
    }
}
