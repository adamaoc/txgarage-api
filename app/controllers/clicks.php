<?php

class Clicks extends Controller
{

	public function index($id = null)
  {
    $clicksModel = $this->model('ClicksModel');
   	if($_GET['campaign']) {
      $clicks = $clicksModel->fetch($_GET['campaign']);
   	}elseif($id) {
  		$clicks = $clicksModel->fetch($id);
  	}else{
      $clicks = $clicksModel->getAll();
    }
    $this->api($clicks, 'clicks');
  }

  public function post()
  {
    $clicksModel = $this->model('ClicksModel');
    $click = $clicksModel->postClick($_POST);

    $this->api($click, 'clicks');
  }
	public function postjs()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Key");

    $json = @file_get_contents('php://input');
    $array = json_decode($json, true);

    $clicksModel = $this->model('ClicksModel');
    $click = $clicksModel->postClick($array);

    $this->api($click, 'clicks', 201);
	}

}
