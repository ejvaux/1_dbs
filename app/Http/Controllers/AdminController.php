<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
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
        return view('pages.admin');
    }
    public function userslist()
    {
        $users = User::orderby('id','desc')->paginate(10);
        return view('pages.admin.userslist',compact('users'));
    }
    public function adduser()
    {
        return view('pages.admin.adduser');
    }
    public function userinfo($id)
    {
        $user1 = User::where('id',$id)->first();
        return view('inc.userinfo',compact('user1'));
    }

}
