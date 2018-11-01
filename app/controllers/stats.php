<?php

class Stats extends Controller
{

  public function index()
  {
//     $statsModel = $this->model('StatsModel');
//     $stats = $statsModel->getAll();
    $stats = file_get_contents("https://ampnet.sfo2.cdn.digitaloceanspaces.com/Stats/webstats.json");
    $stats = json_decode($stats);
    $this->api($stats, '');
  }

}
