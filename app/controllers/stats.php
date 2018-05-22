<?php

class Stats extends Controller
{

  public function index()
  {
//     $statsModel = $this->model('StatsModel');
//     $stats = $statsModel->getAll();
    $stats = file_get_contents("http://assets.txgarage.com/webstats.json");
    $stats = json_decode($stats);
    $this->api($stats, 'stats');
  }

}
