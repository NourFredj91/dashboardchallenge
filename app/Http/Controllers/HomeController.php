<?php

namespace App\Http\Controllers;
use App\Challenge;
use Illuminate\Support\Facades\Auth;

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
        $authority = Auth::user()->authority;
        $chanllenges = Challenge::all()->toArray();
        return view('home', compact('chanllenges', 'authority'));

    }
}
