<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especie;
use App\Http\Requests;
use Illuminate\Http\Response;

class EspecieController extends Controller
{
    public function index()
    {
		return new VarAppiResponse(VarAppiResponse::SUCCESS,Especie::all());
    }
    public function create(Request $request)
    {
        $this->validate($request, [
                'phylum' => 'required',
                'reino' => 'required',
                'subclase' => 'required',
                'familia' => 'required',
                'genero' => 'required',
                'especie' => 'required',
                'nombreComun' => 'required',
                'orden_id' => 'required',
                'imagen_id' => 'required',
        ]);
        $especie = new Especie;
        $especie->phylum = $request->phylum;
        $especie->reino = $request->reino;
        $especie->subclase = $request->subclase;
        $especie->familia = $request->familia;
        $especie->genero = $request->genero;
        $especie->especie = $request->especie;
        $especie->nombreComun = $request->nombreComun;
        $especie->orden_id = $request->orden_id;
        $especie->imagen_id = $request->imagen_id;
        $especie->save();

		return new VarAppiResponse(VarAppiResponse::SUCCESS,$especie);
    }
    
    public function show($id)
    {
        $especie = Especie::find($id);
        if(is_null($especie))
		{
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
        
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$especie);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'id' => 'required',
                'phylum' => 'required',
                'reino' => 'required',
                'subclase' => 'required',
                'familia' => 'required',
                'genero' => 'required',
                'especie' => 'required',
                'nombreComun' => 'required',
                'orden_id' => 'required',
                'imagen_id' => 'required',
        ]);

        $especie = Especie::find($id);
        if(is_null($especie))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
        $especie->phylum = $request->phylum;
        $especie->reino = $request->reino;
        $especie->subclase = $request->subclase;
        $especie->familia = $request->familia;
        $especie->genero = $request->genero;
        $especie->especie = $request->especie;
        $especie->nombreComun = $request->nombreComun;
        $especie->orden_id = $request->orden_id;
        $especie->imagen_id = $request->imagen_id;
        $especie->save();
       
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$especie);
 
    }
    public function destroy($id)
    {
        $especie = Especie::find($id);
        if(is_null($especie))
        {   
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}
        $especie->delete();
        
		return new VarAppiResponse(VarAppiResponse::SUCCESS);
    }

    public function getAreas($id)
    {
        $especie = Especie::find($id);
        if(is_null($especie))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$especie->areas());
	}

	public function getEspecimenes($id)
	{
        $especie = Especie::find($id);
        if(is_null($especie))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}

		return new VarAppiResponse(VarAppiResponse::SUCCESS, $especie->especimenes());
		
	}
	public function getOrden()
	{
	    $especie = Especie::find($id);
        if(is_null($especie))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$especie->orden());

	}

	public function getRespuesta($id)
	{
		$especie = Especie::find($id);
        if(is_null($especie))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$especie->respuesta());
	}
	public function getImagenes($id)
	{
		$especie = Especie::find($id);
        if(is_null($especie))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$especie->imagenes());
	}
}
