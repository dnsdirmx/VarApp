<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notificacion;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Helpers\VarAppiResponse;
class NotificacionController extends Controller
{
    public function index()
    {
		return new VarAppiResponse(VarAppiResponse::SUCCESS,Notificacion::all());
    }
    public function show($id)
    {
        $notificacion = Notificacion::find($id);
        if(is_null($notificacion))
		{
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$notificacion);
    }
    public function destroy($id)
    {
        $notificacion = Notificacion::find($id);
        if(is_null($notificacion))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}
		$notificacion->delete();
        
		return new VarAppiResponse(VarAppiResponse::SUCCESS);
	}

	public function getReporte($id)
	{
		$notificacion = Notificacion::find($id);
		if(is_null($notificacion))
		{
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);

		}

		return new VarAppiResponse(VarAppiResponse::SUCCESS,$notificacion->reporte());
	}
	public function getResponsable($id)
	{
		$notificacion = Notificacion::find($id);
		if(is_null($notificacion))
		{
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
		}
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$notificacion->responsable());

	}
}
