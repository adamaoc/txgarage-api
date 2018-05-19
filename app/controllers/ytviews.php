<?php

class YTViews extends Controller
{

  public function index()
  {
    $viewsModel = $this->model('ViewsModel');
    $stats = $viewsModel->getYouTubeViews();
		$this->api($stats, 'views');
  }

  public function post()
  {
    $json = @file_get_contents('php://input');
    $array = json_decode($json, true);
    $viewsModel = $this->model('ViewsModel');
    $views = $viewsModel->postYouTubeViews($array);

    $this->api($views, 'views', 201);
  }

}