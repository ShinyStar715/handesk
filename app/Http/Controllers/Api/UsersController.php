<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;

class UsersController extends ApiController
{
    public function index(Request $request){

    	$offset = (isset($request->offset)) ? $request->offset : 0;
    	$num_results = (isset($request->num_results)) ? $request->num_results : 10;

    	$users = User::take($num_results)->skip($offset)->get();
    	return response()->json( $users );
    }
    
    public function store(Request $request)
    {
      $users=new User;
      $users->name=$request->get('name');
      $users->email=$request->get('email');
      $users->password=bcrypt($request->get('password'));

      $users->save();

      return $this->respond([
            'success' => true,
        ]);
    }

}
