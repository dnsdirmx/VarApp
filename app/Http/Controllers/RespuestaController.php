<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Respuesta;
use App\Http\Requests;
use Illuminate\Http\Response;
class RespuestaController extends Controller
{
    public function index()
    {
		
		return new VarAppiResponse(VarAppiResponse::SUCCESS,Respuesta::all());
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'respuesta' => 'required',
            'pregunta_id' => 'required',
        ]);

        $respuesta = new Respuesta;
        $respuesta->respuesta = $request->respuesta;
        $respuesta->pregunta_id = $request->pregunta_id;
        $respuesta->siguiente = $request->siguiente;
        $respuesta->especie_id = $request->especie_id;

        $respuesta->save();
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$respuesta);
    }
    public function show($id)
    {
        $respuesta = Respuesta::find($id);
        if(is_null($respuesta))
        {

			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
 
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$respuesta);
 
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'respuesta' => 'required',
            'pregunta_id' => 'required',
        ]);

        $respuesta = Respuesta::find($id);
        if(is_null($respuesta))
        {

			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }

        $respuesta->respuesta = $request->respuesta;
        $respuesta->pregunta_id = $request->pregunta_id;
        $respuesta->siguiente = $request->siguiente;
        $respuesta->especie_id = $request->especie_id;

		$respuesta->save();	
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$respuesta);
    }
    public function destroy($id)
    {
        $respuesta = Respuesta::find($id);
        if(is_null($respuesta))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		$respuesta->deleted();
		return new VarAppiResponse(VarAppiResponse::SUCCESS);
    }
	
	public function getPregunta($id)
	{
		$respuesta = Respuesta::find($id);
        if(is_null($respuesta))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$respuesta->pregunta());
	}
	public function getSiguiente($id)
	{
		$respuesta = Respuesta::find($id);
        if(is_null($respuesta))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }

		$pregunta = RespuestaPregunta::find($respuesta->id)->siguientePregunta();
		if($pregunta->count() > 0)
			return new VarAppiResponse(VarAppiResponse::SUCCESS,$pregunta);

		$especie = RespuestaEspecie::find($respuesta->id)->especie();
		if(!is_null($especie))
			return new VarAppiResponse(VarAppiResponse::SUCCESS,$especie);
		

		return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
	}
	public function setSiguiente($id, Request $request)
	{
		return new VarAppiResponse(VarAppiResponse::SUCCESS);
	}
}
