<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Area;

use App\Helpers\VarAppiResponse;
class AreaController extends Controller
{
    /**
     * @api {get} /areaespecies/ Solicita todos las areas de especie
     * @apiName getAreaEspecies
     * @apiGroup AreaEspecie
     *
     *
     * @apiSuccess {json} AreaEspecie
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     [
     *      { 
     *          "id" : 1,
     *          "aLatitud" : 40.75793,
     *          "aLongitud" : -73.98551,
     *          "bLatitud" :  40.76793,
     *          "bLongitud" : -74.98551,
     *          "cLatitud" : 40.77793,
     *          "cLongitud" : -75.98551,
     *          "dLatitud" :  40.78793,
     *          "dLongitud" : -76.98551,
     *      },
     *     ]
     */
    public function index()
    {
        return response()->json(AreaEspecie::all());
    }

    
    /**
     * @api {post} /areaespecies Crea un AreaEspecie
     * @apiName setAreaEspecie
     * @apiGroup AreaEspecie
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     { 
     *          "id" : 1,
     *          "aLatitud" : 40.75793,
     *          "aLongitud" : -73.98551,
     *          "bLatitud" :  40.76793,
     *          "bLongitud" : -74.98551,
     *          "cLatitud" : 40.77793,
     *          "cLongitud" : -75.98551,
     *          "dLatitud" :  40.78793,
     *          "dLongitud" : -76.98551,
     *          "especie_id" : 1
     *     }
     *
     * @apiError AreaEspecieNotFound
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "state" : "error",
     *       "message" : "some error "
     *     }
     */
    public function create(Request $request)
    {
        $areaespecie = new AreaEspecie;
        
        $areaespecie->aLatitud = $request->aLatitud;
        $areaespecie->aLongitud = $request->aLongitud;
        $areaespecie->bLatitud = $request->bLatitud;
        $areaespecie->bLongitud = $request->bLongitud;
        $areaespecie->cLatitud = $request->cLatitud;
        $areaespecie->cLongitud = $request->cLongitud;
        $areaespecie->dLatitud = $request->dLatitud;

        $areaespecie->save();
    }

    /**
     * @api {get} /areaespecies/:id Obtiene un AreaEspecie
     * @apiName getAreaEspecie
     * @apiGroup AreaEspecie
     *
     * @apiParam {Number} id del AreaEspecie
     *
     * @apiSuccess {String} state estado de la solicitud
     * @apiSuccess {String} mensaje del api
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     { 
     *          "id" : 1,
     *          "aLatitud" : 40.75793,
     *          "aLongitud" : -73.98551,
     *          "bLatitud" :  40.76793,
     *          "bLongitud" : -74.98551,
     *          "cLatitud" : 40.77793,
     *          "cLongitud" : -75.98551,
     *          "dLatitud" :  40.78793,
     *          "dLongitud" : -76.98551,
     *     }
     *
     * @apiError AreaEspecieNotFound
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "state" : "error",
     *       "message" : "model not found"
     *     }
     */    
    public function show($id)
    {
        return AreaEspecie::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $areaespecie = Area::find($id);
		if(!is_null($areaespecie))
			return new VarAppiResponse(VarAppiResponse::ERROR_MODELO_NO_ENCONTRADO);

        $areaespecie->aLatitud = $request->aLatitud;
        $areaespecie->aLongitud = $request->aLongitud;
        $areaespecie->bLatitud = $request->bLatitud;
        $areaespecie->bLongitud = $request->bLongitud;
        $areaespecie->cLatitud = $request->cLatitud;
        $areaespecie->cLongitud = $request->cLongitud;
        $areaespecie->dLatitud = $request->dLatitud;

		$areaespecie->save();

		return new VarAppiResponse(VarAppiResponse::SUCCESS,$areaespecie);
    }


    /**
     * @api {delete} /areaespecies/:id Elimina un AreaEspecie
     * @apiName deleteAreaEspecie
     * @apiGroup AreaEspecie
     *
     * @apiParam {Number} id del AreaEspecie
     *
     * @apiSuccess {String} state estado de la solicitud
     * @apiSuccess {String} mensaje del api
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *      "estatus" : "success",
     *      "descripcion" : "deleted"
     *     }
     *
     * @apiError AreaEspecieNotFound
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "state" : "error",
     *       "message" : "model not found"
     *     }
     */
    public function destroy($id)
    {
        $areaespecie = AreaEspecie::find($id);
        if(!is_null($areaespecie))
        {
            $areaespecie->delete();
            return new Response(null,HTTP_OK);
        }
        else
        {
                
            $response = new Response(['state' => 'error', 'message' => 'model not found'],Response::HTTP_NOT_FOUND);
            $response->withHeaders(['Content-Type' => 'application/json']);
            return $response;
        }

    }
}
