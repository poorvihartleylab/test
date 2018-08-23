<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{   

    public function index(){
       $role = Role::all();
       return view('add-user')->with(['role' => $role]);
    }
    public function store(Request $request) {
      
    	$role = new Role();
    	$role->role_name = $request->input('role_name');
    	$saved = $role->save();

    	if($saved) {
    		echo "Role Added";
          
    	}
    	else {
    		echo "Failed to add Role";
    	}
    }

    /* public function viewRoles() {
          $role = Role::all();
         view('add-user')->with(['roles' => $role]);
    }*/
    
}
