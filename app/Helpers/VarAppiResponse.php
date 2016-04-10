<?php
namespace App\Helpers;

use \Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
class VarAppiResponse extends Response
{

	const SUCCESS = 0;
	const ERROR_MODELO_NO_ENCONTRADO = 1;

	const STATUS_TITULO = array(
		self::ERROR_MODELO_NO_ENCONTRADO => 'Error',
		self::SUCCESS => 'Success'
	);

	const STATUS_DESCRIPCION = array(
		self::ERROR_MODELO_NO_ENCONTRADO => "El recurso no fue encontrado",
		self::SUCCESS => "Operacion realizada con exito"
	);

	const HTTP_STATUS = array(
		self::ERROR_MODELO_NO_ENCONTRADO => Response::HTTP_NOT_FOUND,
		self::SUCCESS => Response::HTTP_OK
	);

	function  __construct($codigoResp = self::SUCCESS, $content = null )
	{
		parent::__construct();
		if(!is_null($content))
			$content = $content->toJson();	
		else
		{
			$content = [
				'estatus' => self::STATUS_TITULO[$codigoResp],
				'descripcion' => self::STATUS_DESCRIPCION[$codigoResp]
			];
		}
		$this->setContent($content);
		$this->setStatusCode(self::HTTP_STATUS[$codigoResp]);
		$this-> withHeaders(['Content-Type' => 'application/json']);
	}

	public function setModelo(Model $modelo)
	{
		$this->setContent($modelo->toJson());
	}

	public function setColeccion(Collection $modelos)
	{
		$this->setContent($modelos->toJson());
	}

}

