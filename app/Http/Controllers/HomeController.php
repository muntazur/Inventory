<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function ajaxRequest()

    {

        return view('ajaxRequest');

    }

   

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function ajaxRequestPost(Request $request)

    {

        $input = $request->all();
         
        $user = new User;
  		
  		$user->name = $request->name;
  		//$user->email = $request->email;
  		//$user->password = $request->password;

  		//$user->save();
         
        $returnHtml = view('welcome')->render();

        return response()->json(['success'=>true,'html'=>$returnHtml]);
        //return response()->view('welcome');

    }

}