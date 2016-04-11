<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Informante;
use Illuminate\Http\Response;
use App\Helpers\VarAppiResponse;

class InformanteController extends Controller
{
    public function index()
    {
		//return response()->json(Informante::all());
		return new VarAppiResponse(VarAppiResponse::SUCCESS,Informante::all());	
	}

    public function create(Request $request)
    {
		$this->validate($request, [
			'nombre' => 'required' ,
			'email' => 'required',
			'telefono' => 'required',
		]);
		$informante = new Informante;
	    $informante->nombre = $request->nombre;
	    $informante->email = $request->email;
	    $informante->telefono = $request->telefono;
	    $informante->save();
		return response()->json($informante);
		return new VarAppiResponse(VarAppiResponse::SUCCESS, $informante);

	}

    public function show($id)
    {
		$informante = Informante::find($id);
	    if(is_null($informante))
		{
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$informante);
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'nombre' => 'required' ,
			'email' => 'required',
			'telefono' => 'required',
		]);
        $informante = Informante::find($id);
        if(is_null($informante))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}
        $informante->nombre = $request->nombre;
        $informante->email = $request->email;
        $informante->telefono = $request->telefono;
        $informante->save();
        
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$informante);
	}
   
    public function destroy($id)
    {
		$informante = Informante::find($id);
	    if(is_null($informante))
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		$informante->delete();
		return new VarAppiResponse(VarAppiResponse::SUCCESS);
	}


    public function getReportes($id)
    {
        $informante = Informante::find($id);
	    if(is_null($informante))
		{
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$informante->reportes());
	     
	}
}

