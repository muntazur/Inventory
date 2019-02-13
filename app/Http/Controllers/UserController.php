<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //home
    public function home()
    {
    	return view('welcome');
    }

    public function storeUser(Request $request)
    {   
        

        $input = $request->all(); 

        $user = new User;

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];

        $exists = DB::table('users')->where('email',$user->email)->first();
 
        if($exists)
        {
            return response()->json(['success'=> true,'msg'=>'Already have an account']);
        }

        if($input['password']==$input['repeat_password'])
        {

            $user->save();
            return response()->json(['success'=> true,'msg'=>'Successfully Registered']);

       }
       else
       {
            return response()->json(['success'=> true,'msg'=>'Password Mismatched ! Try again.']);
       }

    }












    /*
    // provide a form for an user
    public function signupForm()
    {

       $returnHtml = view('user.signup')->render();

       return response()->json(['success'=>true,'html'=>$returnHtml]);
    }
    // store an user information

    // login form
    public function loginForm()
    {
        $returnHtml = view('user.login')->render();
        return response()->json(['success'=>true,'html'=>$returnHtml]);
    }*/
}
