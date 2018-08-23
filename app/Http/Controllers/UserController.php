<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Role;
use App\Mobile;
use Response;

class UserController extends Controller
{
    public function index(){
        $role = Role::all();
        return view('add-user')->with(['roles' => $role]);
    }

    public function store(Request $request) {
    	$user = new User();

    	$user->first_name = $request->input('first_name');
    	$user->last_name = $request->input('last_name');
    	$user->email = $request->input('email');
    	$user->password = Hash::make($request->input('password'));
        $user->role_id = $request->input('role');
    	$saved = $user->save();
        $insertedId = $user->id;   //get last insert id

    	if($saved) {

            $mobile_data = $request->input('mobile_no');
            foreach($mobile_data as $mobile_data){
                //echo $key;
                $mobile = new Mobile();
                $mobile->mobile = $mobile_data;
                $mobile->user_id   = $insertedId;
                $mobile->save();
            }

            echo "Add user";
            //dd($mobile->mobile_no);
            //return redirect('/list');
    	}
    	else {
    		echo "Failed to add user";
    	}
    }

    public function listUsers() {
    	$user = User::all();
    	return view('user-list')->with(['users' => $user]);
    }

    public function destroyUsers(Request $request) {
        
       //echo $id;
    }
    
}
