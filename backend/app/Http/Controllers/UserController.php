<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(10);
     
        return $users;
    }

    public function login(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if($user) 
        {
            $verify = password_verify($request->password, $user->password);
    
            if ($verify) {
                return true;
            } 
        }

        return false;
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $hash = password_hash($request->password, PASSWORD_DEFAULT);

        $request->merge(['password' => $hash]);

        User::create($request->all());
     
        return true;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $user = User::find($request->id);

        if($user)
        {
            $hash = password_hash($request->password, PASSWORD_DEFAULT);

            if($user->password != $hash) 
            {
                $request->merge(['password' => $hash]);
            }

            $user->update($request->all());
        
            return true;
        }
        else
        {
            return false;
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $user = User::find($request->id);

        if($user)
        {
            $user->delete();

            return true;
        }
        else
        {
            return false;
        }
    }
}