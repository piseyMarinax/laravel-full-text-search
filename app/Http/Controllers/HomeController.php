<?php

namespace App\Http\Controllers;
use App\User;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function mySearch(Request $request)
    {
        if ($request->has('search')) {
            $users = User::search($request->get('search'))->get();
        } else {
            $users = User::get();
        }


        return view('my-search', compact('users'));
    }
}
