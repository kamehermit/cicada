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
    	try{

    	}
    	catch(Exception $e){
    		
    	}
    }
}
