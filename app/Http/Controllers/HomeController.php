<?php

namespace App\Http\Controllers;
use App\Challenge;
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

        $this->middleware(['auth' => 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chanllenges = Challenge::all()->toArray();
        return view('home', compact('chanllenges'));

    }
}
