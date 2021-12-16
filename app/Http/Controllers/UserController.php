<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function addpost(Request $request){
        User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        // return redirect()->with('status','Your deatails is successfully save!');
    }

    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
   
        $form = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password')
     );
dd($form);
     if(Auth::attempt($form))
     {
      return redirect('main/successlogin');
     }
     else
     {
      return back()->with('error', 'Wrong Login Details');
     }

       
    }

}
