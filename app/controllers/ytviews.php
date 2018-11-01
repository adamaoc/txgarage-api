<?php

class YTViews extends Controller
{

  public function index()
  {
    // $viewsModel = $this->model('ViewsModel');
    // $stats = $viewsModel->getYouTubeViews();
    $stats = file_get_contents("https://ampnet.sfo2.cdn.digitaloceanspaces.com/Stats/ytviews.json");
    $stats = json_decode($stats);

		$this->api($stats, '');
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
