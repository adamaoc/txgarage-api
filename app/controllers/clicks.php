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

}
