<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobile;

class MobileController extends Controller
{
    public function store(Request $request){
    	$mobile = new Mobile();
    	$mobile->mobile =  $request->input('mobile_no');
    	$saved = $mobile->save();
    	if($saved){
    		echo "Mobile Added!!";
    	}else{
    		echo "Not saved!!";
    	}
    }
}
