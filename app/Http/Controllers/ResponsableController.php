<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Responsable;
use App\Http\Requests;
use Illuminate\Http\Response;

use App\Helpers\VarAppiResponse;
class ResponsableController extends Controller
{
    public function index()
    {
		return new VarAppiResponse(VarAppiResponse::SUCCESS,User::all());
    }
    public function create()
    {
        $this->validate($request, [
            'nombre' => 'required',
            'adscripcion' => 'required',
            'activo' => 'required',
            'rol' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new Responsable;
        $user->nombre = $request->nombre;
        $user->adscripcion = $request->adscripcion;
        $user->activo = $request->activo;
        $user->rol = $request->rol;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        $user->password = $request->password;   
        $user->save();

		return new VarAppiResponse(VarAppiResponse::SUCCESS,$user);
    }

    public function show($id)
    {
        $user = Responsable::find($id);
        if(is_null($user))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
       
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$user);
 
    }
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'nombre' => 'required',
            'adscripcion' => 'required',
            'activo' => 'required',
            'rol' => 'required',
            'telefono' => 'required',
            'email' => 'required',
        ]);

        $user = Responsable::find($id);
        if(is_null($user))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }


        $user->nombre = $request->nombre;
        $user->adscripcion = $request->adscripcion;
        $user->activo = $request->activo;
        $user->rol = $request->rol;
        $user->telefono = $request->telefono;
        $user->email = $request->email;

        if ($request->has('password')) {
            $user->password = $request->password;   
        }
        $user->save();
        
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$user);
    }
    public function destroy($id)
    {
        $user = Responsable::find($id);
        if(is_null($user))
		{
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
        $user->delete();
       
		return new VarAppiResponse(VarAppiResponse::SUCCESS);
 
	}

	public function getAreas($id)
	{
		 $user = Responsable::find($id);
        if(is_null($user))
		{
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$user->areas());

	}
	public function getNotificaciones($id)
	{
		 $user = Responsable::find($id);
        if(is_null($user))
		{
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$user->notificaciones());

	}
}
