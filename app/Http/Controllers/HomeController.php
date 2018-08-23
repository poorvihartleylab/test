<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       $users = User::all();

        // Get the currently authenticated user...
        $user = Auth::user();

        // Get the currently authenticated user's ID...
        $id = Auth::id();
       // dd($id);
       return view('home')->with(['user_list' => $users]);
    }



  
}
