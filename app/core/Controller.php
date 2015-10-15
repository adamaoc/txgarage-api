<?php

class Controller
{
	public function model($model)
	{
		require_once $_SERVER['DOCUMENT_ROOT'].'/app/models/'.$model.'.php';
		return new $model();
	}
	public function api($data, $name)
	{
		header("HTTP/1.1 200 OK");
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
}
