<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
  public function createUser(Request $request){

    $user=new User;

    $user->firstName=$request->firstName;
    $user->lastName=$request->lastName;
    $user->nickname=$request->nickname;
    $user->email=$request->email;
    $user->telefone=$request->telefone;
    $user->idade=$request->idade;
    $user->password=$request->password;
    $user->save();

    return response()-json([$user]);
  }

  public function listUser(){
    $user =User::all();
    return response()->json($user);
  }
  public function showUser($id){

    $user=User::findOrFail($id);
    return response()->json([$user]);
  }


  public function updateUser(Request $request,$id){

    $user=User::find($id);

    if($user){
      if($request->firstName){
        $user->firstName = $request->firstName;
      }

      if($request->lastName){
        $user->lastName = $request->lastName;
      }


      if($request->nickname){
        $user->nickname = $request->nickname;

      }

      if($request->email){
        $user->email = $request->email;
      }

      if($request->telefone){
        $user->telefone = $request->telefone;
      }

      if($request->idade){
        $user->idade = $request->idade;
      }

      if($request->password){
        $user->password = $request->password;
      }

      $user->save();
      return response()-json([$user]);

    }

    else{
      return response()->json(['Este usuário não existe']);
    }
  }

  public function deleteUser($id){
    User::destroy($id);
    return response()->json(['USUÁRIO DELETADO']);
  }

}
