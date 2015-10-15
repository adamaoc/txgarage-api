<?php

class Stats extends Controller
{

  public function index()
  {
    $statsModel = $this->model('StatsModel');
    $stats = $statsModel->getAll();
		$this->api($stats, 'stats');
  }

}
