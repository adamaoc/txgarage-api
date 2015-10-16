<?php

class Controller
{

	public function model($model)
	{
		require_once $_SERVER['DOCUMENT_ROOT'].'/app/models/'.$model.'.php';
		return new $model();
	}

	public function api($data, $name, $code = 200)
	{
		$headerCode = $this->_headerCodes($code);
		// header("HTTP/1.1 200 OK");
		header("HTTP/1.1 " . $headerCode);
		header("Content-Type:application/json");
		// header("Content-Type: application/vnd.api+jso");
		header("Access-Control-Allow-Origin: *");
		// $response['status'] = "200";
		// $response['status_message'] = "OK";
		if($name) {
			$response[$name] = $data;
		}else{
			$response = $data;
		}
		$json_responce = json_encode($response);
		echo $json_responce;
	}

	private function _headerCodes($code)
	{
		switch ($code) {
	    case 200:
        return "200 OK";
        break;
	    case 201:
        return "201 Created";
        break;
	    case 500:
        return "500 Error";
        break;
		}
	}
}
