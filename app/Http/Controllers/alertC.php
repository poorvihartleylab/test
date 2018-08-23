<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class alertC extends Controller
{
    public function __construct()
    {
        $this->middleware('age');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
      echo "store data";
    }
}
