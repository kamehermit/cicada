<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\EventSchedule;
use Carbon\Carbon;
use App\User;
use Auth;
use App\BanUser;

class PageController extends Controller
{
    public function start(){
        return view('pages.start');
    }

    public function text(){
        return view('pages.text');
    }

    public function index(){
        list($time,$tagline) = $this->get_time_tagline();
        return view('pages.index',['start_time'=>$time,'tagline'=>$tagline]);
    }

    public function dashboard(){
        list($time,$tagline) = $this->get_time_tagline();
        return view('pages.dashboard',['start_time'=>$time,'tagline'=>$tagline]);
    }

    public function terminal(){
    	return view('pages.terminal');
    }

    public function level2(){
        list($time,$tagline) = $this->get_time_tagline();
        return view('pages.redirect',['start_time'=>$time,'tagline'=>$tagline]);
    }

    public function cmail(){
        list($time,$tagline) = $this->get_time_tagline();
        return view('pages.cmail',['start_time'=>$time,'tagline'=>$tagline]);
    }

    public function notlevel3(){
        return "trolololololol";
    }

    public function inbox(){
        list($time,$tagline) = $this->get_time_tagline();
        return view('pages.inbox',['start_time'=>$time,'tagline'=>$tagline]);
    }


    public function hotel_reservation(){
        list($time,$tagline) = $this->get_time_tagline();
        return view('pages.hotel',['start_time'=>$time,'tagline'=>$tagline]);
    }

    public function navigation(){
        list($time,$tagline) = $this->get_time_tagline();
        return view('pages.navigation',['start_time'=>$time,'tagline'=>$tagline]);   
    }

    public function doors(){
        list($time,$tagline) = $this->get_time_tagline();
        return view('pages.doors',['start_time'=>$time,'tagline'=>$tagline]);  
    }

    public function banned(){
        //list($time,$tagline) = $this->get_time_tagline();
        $check = BanUser::where('user_id',\Auth::user()->id)->orderBy('timestamp','desc')->get(['timestamp','type_id'])->first();
        if(!$check){
            return redirect('dashboard');
            //$cur_time = Carbon::now('Asia/Kolkata');
            //$ban_time = Carbon::createFromFormat('Y-m-d H:i:s', $check->timestamp, 'Asia/Kolkata');
            //if($cur_time->diffInHours($ban_time)<1){
                //return view('pages.banned');
            //    return \Redirect::route('banned');
            //}
        }
        $cur_time = Carbon::now('Asia/Kolkata');
        $ban_time = Carbon::createFromFormat('Y-m-d H:i:s', $check->timestamp, 'Asia/Kolkata');
        if($check->type_id==1){
            if($cur_time->diffInMinutes($ban_time)<30)
                return view('pages.banned');
            else
                return redirect('dashboard');
        }
        if($check->type_id==2){
            if($cur_time->diffInHours($ban_time)<1)
                return view('pages.banned');
            else
                return redirect('dashboard');
        }
        return view('pages.banned');
    }

    public function usb(){
        list($time,$tagline) = $this->get_time_tagline();
        return view('pages.usb',['start_time'=>$time,'tagline'=>$tagline]);   
    }

    public function get_time_tagline(){
        try{
            $data = EventSchedule::get()->first();
            $start_time = Carbon::createFromFormat('Y-m-d H:i:s', $data->start, 'Asia/Kolkata');
            $end_time = Carbon::createFromFormat('Y-m-d H:i:s', $data->end, 'Asia/Kolkata');
            $cur_time = Carbon::now('Asia/Kolkata');
            if($cur_time->lt($start_time) || $cur_time->gte($end_time)){
                $date = $start_time->format('Y-m-d');
                $time = $start_time->format('H:i:s');
                $start = $date."T".$time;
                $tagline = 'The Tech Hunt will start in...';
                return array($start,$tagline);
            }
            else{
                $date = $end_time->format('Y-m-d');
                $time = $end_time->format('H:i:s');
                $end = $date."T".$time;
                $tagline = 'The Tech Hunt will end in...';
                return array($end,$tagline);
            }
        }
        catch(Exception $e){
            $cur_time = Carbon::now('Asia/Kolkata');
            $tagline = 'An error occured...';
            $date = $cur_time->format('Y-m-d');
            $time = $cur_time->format('H:i:s');
            $end = $date."T".$time;
            return array($end,$tagline);
        }
        
    }

}
