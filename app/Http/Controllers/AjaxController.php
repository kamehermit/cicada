<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use EventSchedule;
use App\User;
use Carbon\Carbon;
use Auth;
use App\Page;

class AjaxController extends Controller
{
    public function term_login(Request $request){
    	$uname = 'neo';
    	$pwd = 'reeves';
    	$data = $request->only('username','password');
    	$aurl = Page::where('id',2)->get(['url'])->first();
    	$url = 'http://cicada.dev'.$aurl->url;
    	try{
    		if(strcasecmp($data['username'],$uname) || strcasecmp($data['password'], $pwd)){
    			return response()->json([
    				'status' => 'Unauthorized',
    				'status_code' => '401',
    				'message' => 'Wrong Credentials',
    				'data' => 'null'
    				]);
    		}
    		else{
    			User::where('id',Auth::user()->id)->update(['page_id'=>1,'timestamp'=>Carbon::now('Asia/Kolkata')]);
    			return response()->json([
    				'status' => 'success',
    				'status_code' => '200',
    				'message' => 'Login Successful',
    				'data' => $url
    				]);
    		}
    	}
    	catch(Exception $e){

    	}
    }

    public function cmail_auth(Request $request){
        $uname = 'admin';
        $pwd = 'adacic';
        $data = $request->only('username','password');
        $aurl = Page::where('id',4)->get(['url'])->first();
        $url = 'http://cicada.dev'.$aurl->url;
    	try{
            if(strcasecmp($data['username'],$uname) || strcasecmp($data['password'], $pwd)){
                return response()->json([
                    'status' => 'Unauthorized',
                    'status_code' => '401',
                    'message' => 'Wrong Credentials',
                    'data' => 'null'
                    ]);
            }
            else{
                User::where('id',Auth::user()->id)->update(['page_id'=>3,'timestamp'=>Carbon::now('Asia/Kolkata')]);
                return response()->json([
                    'status' => 'success',
                    'status_code' => '200',
                    'message' => 'Login Successful',
                    'data' => $url
                    ]);
            }
    	}
    	catch(Exception $e){
    		
    	}
    }

    public function hotel_reservation(){
        User::where('id',Auth::user()->id)->update(['page_id'=>4,'timestamp'=>Carbon::now('Asia/Kolkata')]);
        $url = Page::where('id',5)->get(['url'])->first();
        return redirect($url->url);
    }

    public function confirm_reservation(Request $request){
        $date='09/20/2017';
        $data = $request->only('date');
        $aurl = Page::where('id',6)->get(['url'])->first();
        $url = 'http://cicada.dev'.$aurl->url;
        try{
            if(strcasecmp($data['date'], $date)){
                return response()->json([
                    'status' => 'Unauthorized',
                    'status_code' => '401',
                    'message' => 'Wrong date',
                    'data' => 'null'
                    ]);
            }
            else{
                User::where('id',Auth::user()->id)->update(['page_id'=>5,'timestamp'=>Carbon::now('Asia/Kolkata')]);
                return response()->json([
                    'status' => 'success',
                    'status_code' => '200',
                    'message' => 'Reservation Successful',
                    'data' => $url
                    ]);
            }
        }
        catch(Exception $e){

        }
    }

    public function pattern_auth(Request $request){
        $pattern = '3547896';
        $data = $request->only('pattern');
        $aurl = Page::where('id',7)->get(['url'])->first();
        $url = 'http://cicada.dev'.$aurl->url;
        try{
            if(strcasecmp($data['pattern'], $pattern)){
                return response()->json([
                    'status' => 'Unauthorized',
                    'status_code' => '401',
                    'message' => 'Wrong pattern. Try again.',
                    'data' => 'null'
                    ]);
            }
            else{
                User::where('id',Auth::user()->id)->update(['page_id'=>6,'timestamp'=>Carbon::now('Asia/Kolkata')]);
                return response()->json([
                    'status' => 'success',
                    'status_code' => '200',
                    'message' => 'Device unlocked successfully.',
                    'data' => $url
                    ]);
            }
        }
        catch(Exception $e){

        }
    }
}
