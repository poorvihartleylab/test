<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Response;
class RoleController extends Controller {
    public function index() {
        $role = Role::all();
        return view('add-user')->with(['role' => $role]);
    }

    public function store(Request $request) {
        $request->validate(['role_name' => 'required | unique:roles']);
        $role = new Role();
        $role->role_name = $request->input('role_name');
        $saved = $role->save();
        if ($saved) {
            return \Redirect::route('add-role')->with('status', 'Role added successfully !');
        } else {
            return \Redirect::route('add-role')->with('status', 'Role not added !');
        }
    }
    public function list() {
        $role = Role::orderBy('id', 'DESC')->paginate(5);
        return view('role-list')->with(['roles' => $role]);
    }

    public function destroy($id) {
        $user = User::where('role_id', '=', $id )->delete();
        
        if($user){
            Role::where('id', $id)->delete();
            return redirect('role-list')->with('status', 'Role deleted successfully !');
        }
    }

    public function edit($id) {
      
        $role = Role::find($id);//fetch single data into object formate
        return view('edit-role')->with(['roles' => $role]);
    }

     public function update(Request $request, $id) {
       $request->validate(['role_name' => 'required | unique:roles']);
        $role = Role::find($id);
        $role->role_name = $request->input('role_name');
        $data = $role->save();
        if ($data) {
            return \Redirect::route('role-list')->with('status', 'Role updated successfully !');
        } else {
            return \Redirect::route('role-list')->with('status', 'Role not updated !');
        }
    }
}
