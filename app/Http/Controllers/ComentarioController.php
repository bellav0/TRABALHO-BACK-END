<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;

class ComentarioController extends Controller
{


   public function createComentario(Request $request){

    $coment=new comentario;

    $coment->texto=$request->texto;
    $coment->votosPositivos=$request->votosPositivos;
    $coment->votosNegativos=$request->votosNegativos;
    $coment->dataPublicaçao=$request->dataPublicaçao;
    $coment->idDoPerfil=$request->telefone;

    $coment->save();

    return response()-json([$coment]);
  }

  public function listComentario(){
    $coment =comentario::all();
    return response()->json($coment);
  }
  public function showComentario($id){

    $coment=comentario::findOrFail($id);
    return response()->json([$coment]);
  }


  public function updateComentario(Request $request,$id){

    $coment=comentario::find($id);

    if($coment){
      if($request->texto){
        $coment->texto = $request->texto;
      }

      if($request->votosPositivos){
        $coment->votosPositivos = $request->votosPositivos;
      }


      if($request->votosNegativos){
        $coment->votosNegativos = $request->votosNegativos;

      }

      if($request->dataPublicaçao){
        $coment->dataPublicaçao = $request->dataPublicaçao;
      }

      if($request->idDoPerfil){
        $coment->idDoPerfil = $request->idDoPerfil;
      }

      $coment->save();
      return response()-json([$coment]);

    }

    else{
      return response()->json(['Este comentário não existe']);
    }
  }

  public function deleteComentario($id){
    comentario::destroy($id);
    return response()->json(['COMENTÁRIO DELETADO']);
  }

}
