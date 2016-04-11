<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Reporte;
use App\Http\Requests;

use App\Helpers\VarAppiResponse;
class ReporteController extends Controller
{
    public function index()
	{
		return new VarAppiResponse(VarAppiResponse::SUCCESS,Reporte::all());
    }
    public function create()
    {
        $this->validate($request, [
            'latitud' => 'required',
            'longitud' => 'required',
            'precision' => 'required',
            'creadoDispositivo' => 'required',
            'observaciones' => 'required',
        ]);
        $reporte = new Reporte;
        $reporte->latitud = $request->latitud;
        $reporte->longitud = $request->longitud;
        $reporte->precision = $request->precision;
        $reporte->creadoDispositivo = $request->creadoDispositivo;
        $reporte->observaciones = $request->observaciones;
        $reporte->save();
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$reporte);
    }
    public function show($id)
    {
        $reporte = Pregunta::find($id);
        if(is_null($reporte))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$reporte);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'latitud' => 'required',
            'longitud' => 'required',
            'precision' => 'required',
            'creadoDispositivo' => 'required',
            'observaciones' => 'required',
        ]);
        $reporte = Pregunta::find($id);
        if(is_null($reporte))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }

        $reporte->latitud = $request->latitud;
        $reporte->longitud = $request->longitud;
        $reporte->precision = $request->precision;
        $reporte->creadoDispositivo = $request->creadoDispositivo;
        $reporte->observaciones = $request->observaciones;
        $reporte->save();
        

		return new VarAppiResponse(VarAppiResponse::SUCCESS,$reporte);
    }
 
	public function destroy($id)
    {
        $reporte = Pregunta::find($id);
        if(is_null($reporte))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
        $reporte->delete();

		return new VarAppiResponse(VarAppiResponse::SUCCESS);

    }

    public function getEspecimenes($id)
    {
        $reporte = Pregunta::find($id);
        if(is_null($reporte))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$reporte->especimenes());
    }

    public function getNotificaciones($id)
    {
        $reporte = Pregunta::find($id);
        if(is_null($reporte))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS,$reporte->notificaciones() );
    }

    public function getInformante($id)
    {
        $reporte = Pregunta::find($id);
        if(is_null($reporte))
        {
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);
        }
		return new VarAppiResponse(VarAppiResponse::SUCCESS, $reporte->informante());
    }
}
