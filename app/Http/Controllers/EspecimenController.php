<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especimen;
use App\Http\Requests;

class EspecimenController extends Controller
{
    public function index()
    {

		return new VarAppiResponse(VarAppiResponse::SUCCESS,Especimen::all());
    }
   public function create(Request $request)
    {
        $this->validate($request, [
            'estado' => 'required' ,
            'sexo' => 'required',
            'imagen_id' => 'required',
            'reporte_id' => 'required',
        ]);
        $mamifero = new Especimen;
        $mamifero->estado = $request->estado;
        $mamifero->sexo = $request->sexo;
        $mamifero->imagen_id = $request->imagen_id;
        $mamifero->reporte_id = $request->reporte_id;

        if ($request->has('especie_id')) {
            $mamifero->especie_id = $request->especie_id;    
        }
        $mamifero->save();
        
        
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$mamifero);
    }

    public function show($id)
    {
        $mamifero = Especimen::find($id);
        if(is_null($mamifero))
        {
           
			new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }

		return new VarAppiResponse(VarAppiResponse::SUCCESS,$mamifero);
    
    }


    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'estado' => 'required' ,
            'sexo' => 'required',
            'imagen_id' => 'required',
            'reporte_id' => 'required',
        ]);
        $mamifero = Especimen::find($id);
        if(is_null($mamifero))
        {
			new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
        $mamifero->estado = $request->estado;
        $mamifero->sexo = $request->sexo;
        $mamifero->imagen_id = $request->imagen_id;
        $mamifero->reporte_id = $request->reporte_id;

        if ($request->has('especie_id')) {
            $mamifero->especie_id = $request->especie_id;    
        }
        $mamifero->save();
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$mamifero);
    }

    public function destroy($id)
    {
        $mamifero = Especimen::find($id);
        if(is_null($mamifero))
        {
            
			new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		$mamifero->delete();
		return new VarAppiResponse(VarAppiResponse::SUCCESS);
 
	}

	public function getImagenes($id)
	{
		$mamifero = Especimen::find($id);
        if(is_null($mamifero))
        {
			new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$mamifero->imagenes());
	}
	public function getReporte($id)
	{
		$mamifero = Especimen::find($id);
        if(is_null($mamifero))
        {
			new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$mamifero->reporte());
	}

	public function getEspecie($id)
	{
		$mamifero = Especimen::find($id);
        if(is_null($mamifero))
        {
			new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}

		return new VarAppiResponse(VarAppiResponse::SUCCESS,$mamifero->especie());
	}


}
