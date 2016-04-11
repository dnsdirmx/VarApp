<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use App\Http\Requests;
use Illuminate\Http\Response;

class OrdenController extends Controller
{
    public function index()
    {
		return new VarAppiResponse(VarAppiResponse::SUCCESS,Orden::all());
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'clase' => 'required' ,
            'orden' => 'required',
        ]);
        $orden = new Orden;
        $orden->clase = $request->clase;
        $orden->orden = $request->orden;
        $orden->save();
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$orden);
    }
    public function show($id)
    {
        $orden = Orden::find($id);
        if(is_null($orden))
		{
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}
       
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$orden);
 

    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'clase' => 'required' ,
            'orden' => 'required',
        ]);
        
        $orden = Orden::find($id);
        if(is_null($orden))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }

        $orden->clase = $request->clase;
        $orden->orden = $request->orden;
        $orden->save();
       
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$orden);
    }

    public function destroy($id)
    {
        $orden = Orden::find($id);
        if(is_null($orden))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }

		return new VarAppiResponse(VarAppiResponse::SUCCESS);
    }

    public function getEspecies($id)
    {
        $orden = Orden::find($id);
        if(is_null($orden))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$orden->especies());
    }
    public function getRecomendaciones($id)
    {
        $orden = Orden::find($id);
        if(is_null($orden))
        {
           
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$orden->recomendaciones());
	}

	public function getImagenes($id)
	{
        $orden = Orden::find($id);
        if(is_null($orden))
        {
           
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$orden->imagenes());
	}

}
