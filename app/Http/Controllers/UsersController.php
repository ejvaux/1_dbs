<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|max:20|unique:users',
            'email' => 'nullable|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'admin' => $request->input('admin'),
            'password' => Hash::make($request->input('password')),            
        ]);

        return redirect()->back()->with('success',"New User Successfully Added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $u = User::where('id',$id)->first();
        $u->name = $request->input('name');
        $u->username = $request->input('username');
        $u->email = $request->input('email');
        $u->password = Hash::make($request->input('password'));
        $u->admin = $request->input('admin');
        $u->save();

        return redirect()->back()->with('success','User information successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success','User account successfully deleted.');
    }
    public function changepass(Request $request, $id)
    {
        $user = User::find($id);
        $hasher = app('hash');
        $pass = $request->input('curr_password');
        if ($hasher->check($pass, $user->password)) {
            if($request->input('new_password') == $request->input('password')){
                $password = Hash::make($request->input('password'));
                $user->password = $password;
                $user->save();
                return redirect()->back()->with('success','Password updated successfully.');
            }
            else{
                return redirect()->back()->with('error','New Password and Confirm Password are not the same.');
            }
        }
        else{
            return redirect()->back()->with('error','Password is incorrect.');
        }    
    }
}
