<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recomendacion;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Helpers\VarAppiResponse;
class RecomendacionController extends Controller
{
    public function index()
    {
		return new VarAppiResponse(VarAppiResponse::SUCCESS, Recomendacion::all());
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required',
            'imagen_id' => 'required',
            'orden_id' => 'required'
        ]);

        $recomendacion = new Recomendacion;
        $recomendacion->descripcion = $request->descripcion;
        $recomendacion->imagen_id = $request->imagen_id;
        $recomendacion->orden->id = $request->orden_id;
        $recomendacion->save();
       
		return new VarAppiResponse(VarAppiResponse::SUCCESS, $recomendacion);
 
    }

    public function show($id)
    {
        $recomendacion = Recomendacion::find($id);
        if(is_null($recomendacion))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }

		return new VarAppiResponse(VarAppiResponse::SUCCESS, $recomendacion);
    }
 
	public function update($id)
    {
        $this->validate($request, [
            'descripcion' => 'required',
            'imagen' => 'required',
            'orden_id' => 'required'
        ]);
        $recomendacion = Recomendacion::find($id);
        if(is_null($recomendacion))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
        $recomendacion->descripcion = $request->descripcion;
        $recomendacion->imagen_id = $request->imagen_id;
        $recomendacion->orden->id = $request->orden_id;
        $recomendacion->save();
        
		return new VarAppiResponse(VarAppiResponse::SUCCESS, $recomendacion);
    }

   public function destroy($id)
    {
        $recomendacion = Recomendacion::find($id);
        if(is_null($recomendacion))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}
		$recomendacion->delete();
       
		return new VarAppiResponse(VarAppiResponse::SUCCESS);
    }

    public function getImagenes($id)
    {
        $recomendacion = Recomendacion::find($id);
        if(is_null($recomendacion))
		{
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS, $recomendacion->imagenes());

	}

    public function getOrden($id)
    {
        $recomendacion = Recomendacion::find($id);
        if(is_null($recomendacion))
		{
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS, $recomendacion->orden());

    }
}
