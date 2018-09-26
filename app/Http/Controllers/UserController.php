<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Role;
use App\Mobile;
use Response;
class UserController extends Controller {
    public function show(Request $request) {
        $value = $request->session()->get('key');
    }
    public function registeration() {
        $role  = Role::all();
        return view('add-user')->with(['roles' => $role]);
    }
    public function store(Request $request) {
        $request->validate(['first_name' => 'required|max:50', 'email' => 'required|max:50|unique:users|email', 'last_name' => 'required|max:50', 'password' => 'required|min:6|confirmed', 'password_confirmation' => 'required|min:6', 'role' => 'required', 'mobile_no.0' => 'required', ], ['mobile_no.0.required' => 'Mobile feild is required', ]);
        $user            = new User();
        $user->firstname = $request->input('first_name');
        $user->lastname  = $request->input('last_name');
        $user->email     = $request->input('email');
        $user->password  = Hash::make($request->input('password'));
        $user->role_id   = $request->input('role');
        $user->message   = $request->input('message');
        $saved           = $user->save();
        $insertedId      = $user->id; //get last insert id
        if ($saved) {
            $mobile_input = $request->input('mobile_no');
            //dd($mobile_input);
            foreach ($mobile_input as $mobile_data) {
                $mobile          = new Mobile();
                $mobile->mobile  = $mobile_data;
                $mobile->user_id = $insertedId;
                $mobile->save();
            }
            return redirect('/registeration')->with('status', 'You have successfully Registered!');
        } else {
            return redirect('/registeration')->with('status', 'Failed to add user!');
        }
    }
    public function listUsers() {
        $user = User::orderBy('id', 'DESC')->paginate(3);
        //dd($user);
        return view('user-list')->with(['users' => $user]);
    }
    public function edit($id) {
        $role   = Role::all(); //role data
        $mobile = Mobile::where('user_id', $id)->get();
        $user   = User::find($id); //single user data
        return view('edit-user')->with(['user' => $user, 'roles' => $role, 'mobile' => $mobile]);
    }
    public function update(Request $request, $id) {
        $request->validate(['first_name' => 'required|max:50', 'email' => 'required|max:50|email', 'last_name' => 'required|max:50', 'password' => 'required', 'role' => 'required', ]);
        $user            = User::find($id);
        $user->firstname = $request->input('first_name');
        $user->lastname  = $request->input('last_name');
        $user->email     = $request->input('email');
        $user->password  = Hash::make($request->input('password'));
        $user->role_id   = $request->input('role');
        $user->message   = $request->input('message');
        $saved           = $user->save();
        if ($saved) {
            $del_mobile  = Mobile::where('user_id', $id)->delete();
            $mobile_input= $request->input('mobile_no');
            //dd($mobile_input);
            foreach ($mobile_input as $mobile_data) {
                $mobile          = new Mobile();
                $mobile->mobile  = $mobile_data;
                $mobile->user_id = $id;
                $mobile->save();
            }
            return redirect('/list');
        } else {
            return redirect('/list')->with('status', 'Failed to update user!');
        }
    }
    public function destroy($id) {
        $mobile_data = Mobile::where('user_id', $id)->delete();
        if ($mobile_data) {
            $user    = User::find($id);
            $user->delete();
            return redirect('/list');
            // return redirect()->back();
            
        }
    }
}
?>