<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prizeArr = [
            'third prize - 1st winner',
            'third prize - 2nd winner',
            'third prize - 3rd winner',
            'second prize - 1st winner',
            'second prize - 2nd winner',
            'first prize',
        ];

        return view('home', compact('prizeArr'));
    }
}
