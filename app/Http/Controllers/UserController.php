<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
  public function __construct(UserModel $user)
  {
    $this -> user = $user;
  }

  public function register(Request $request)
  {

    $user = [
      "id" => $request->id,
      "name"  => $request->name,
      "email"  => $request->email,
      "password"  => md5($request->password)
    ];


    $user = $this->user->create($user);

    return response([
             'msg'=>'success',
         ],200);
  }

  public function all()
  {
  try{
    $user=$this->user->with('Items')->get();

    return $user;
  }
  catch(Exception $ex){
    return response('Failed',400);
  }

  }

  public function find($id)
  {
    $user = $this->user->find($id);


    return $user;
  }

  public function destroy($id)
  {
    $user = $this->user->find($id)->delete();

    return response([
         'msg'=>'success',
     ],200);
  }

  public function updateview(Request $request, $id)
  {

    $user = $this->user->find($id);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = md5($request->password);

    $user = $user->save();

    return response([
         'msg'=>'success',
     ],200);
  }





}
