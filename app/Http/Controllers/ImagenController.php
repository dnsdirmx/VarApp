<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Imagen;
use App\Http\Requests;
use Illuminate\Http\Response;
use Storage;

use App\Helpers\VarAppiResponse;
class ImagenController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $imagen = new Imagen;
        //metodo para almacenar el arhivo
        //
        //
        //
        $file = array('image' => Input::file('image'));
        $rules = array('image' => 'required',);
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
                $response =  new Response(["status" => "error", "message" => "invalido"],Response::HTTP_NOT_FOUND);
                $response->withHeaders(['Content-Type' => 'application/json']);
                return $response;
        }
        else {
            if (Input::file('image')->isValid()) 
            {
                $destinationPath = 'uploads'; 
                $extension = Input::file('image')->getClientOriginalExtension(); 
                $fileName = rand(11111,99999).'.'.$extension; 
                Input::file('image')->move($destinationPath, $fileName); 
                $imagen->save();
                return response()->json($imagen);

           }
            else 
            {
                // sending back with error message.       
                $response =  new Response(["status" => "error", "message" => "model not found"],Response::HTTP_NOT_FOUND);
                $response->withHeaders(['Content-Type' => 'application/json']);
                return $response;

            }
        }
        
        //
        //
        //
        //
        $imagen->save();
        return response()->json($imagen);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagen = Imagen::find($id);
        if(is_null($imagen))
        {
            $response =  new Response(["status" => "error", "message" => "model not found"],Response::HTTP_NOT_FOUND);
            $response->withHeaders(['Content-Type' => 'application/json']);
            return $response;
        }
        return response()->json($imagen);

    }
    public function showFile($id)
    {
        ///devuelve el archivo
        //
        $imagen = Imagen::find($id);
        if(is_null($imagen))
        {
            $response =  new Response(["status" => "error", "message" => "model not found"],Response::HTTP_NOT_FOUND);
            $response->withHeaders(['Content-Type' => 'application/json']);
            return $response;
        }

        if(Storage::exists($imagen->path)) {
                return Storage::get($imagen->path);
        }
        $response =  new Response(["status" => "error", "message" => "file not found"],Response::HTTP_NOT_FOUND);
        $response->withHeaders(['Content-Type' => 'application/json']);
        return $response;

         
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'nombre' => 'required',
            'nombreOriginal' => 'required',
            'path' => 'required',
            'coleccion' => 'required',
        ]);
        $imagen = Imagen::find($id);
        if(is_null($imagen))
        {
            $response =  new Response(["status" => "error", "message" => "model not found"],Response::HTTP_NOT_FOUND);
            $response->withHeaders(['Content-Type' => 'application/json']);
            return $response;
        }
        
        $imagen->nombre = $imagen->nombreOriginal;
        $imagen->nombreOriginal = $imagen->nombreOriginal;
        $imagen->path = $imagen->path;
        $imagen->coleccion = $imagen->coleccion;
        $imagen->save();
        return response()->json($imagen);
    }
    public function updateFile(Request $request, $id)
    {
        //ctualiza el archivo
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagen = Imagen::find($id);
        if(is_null($imagen))
        {
            $response =  new Response(["status" => "error", "message" => "model not found"],Response::HTTP_NOT_FOUND);
            $response->withHeaders(['Content-Type' => 'application/json']);
            return $response;
        }
        $image->delete();

        //aqui elimina el archivo
        
    }
}
