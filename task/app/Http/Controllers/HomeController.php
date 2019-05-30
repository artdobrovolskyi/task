<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$user_id = auth()->user()->id;
    	$user = User::find($user_id);
    	if ($user->blocked === 'true'){
    		Auth::logout();
    		return redirect('/login');
		}
        return view('userPage')->with('posts', $user->posts);
    }
}
