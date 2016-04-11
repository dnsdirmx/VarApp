<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Http\Requests;
use Illuminate\Http\Response;
class PreguntaController extends Controller
{
    public function index()
    {

		return new VarAppiResponse(VarAppiResponse::SUCCESS,Pregunta::all());
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'pregunta' => 'required',
            'inicial' => 'required',
        ]);
        $pregunta = new Pregunta;
        $pregunta->pregunta = $request->pregunta;
        $pregunta->inicial = $request->inicial;
        $pregunta->save();
        
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$pregunta);
    }

    public function show($id)
    {
        $pregunta = Pregunta::find($id);
        if(is_null($pregunta))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}

        
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$pregunta);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pregunta' => 'required',
            'inicial' => 'required',
        ]);

        $pregunta = Pregunta::find($id);
        if(is_null($pregunta))
        {

			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
        $pregunta->pregunta = $request->pregunta;
        $pregunta->inicial = $request->inicial;
        $pregunta->save();
        
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$pregunta);
    }

    public function destroy($id)
    {
        $pregunta = Pregunta::find($id);
        if(is_null($pregunta))
        {

			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
       
		return new VarAppiResponse(VarAppiResponse::SUCCESS);
 
    }
    public function getRespuestas($id)
    {
        $pregunta = Pregunta::find($id);
        if(is_null($pregunta))
		{
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$pregunta->respuestas());
	}
	public function getImagenes($id)
    {
        $pregunta = Pregunta::find($id);
        if(is_null($pregunta))
		{
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$pregunta->imagenes());
	}
}
