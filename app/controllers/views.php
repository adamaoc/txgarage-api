<?php

class Views extends Controller
{

  public function index()
  {
    $viewsModel = $this->model('ViewsModel');
    $stats = $viewsModel->getAll();
		$this->api($stats, 'views');
  }

  public function post()
  {
    $json = @file_get_contents('php://input');
    $array = json_decode($json, true);
    $viewsModel = $this->model('ViewsModel');
    $views = $viewsModel->postViews($array);

    $this->api($views, 'views', 201);
  }

}
