<?php

class Views extends Controller
{

  public function index()
  {
    // $viewsModel = $this->model('ViewsModel');
    // $stats = $viewsModel->getAll();

    $stats = array(
      array(
        "id" => "1",
        "year" => "2018",
        "month" => "Jan",
        "views" => '9847',
        "slugID" => "2018_Jan"
      ),
      array(
        "id" => "2",
        "year" => "2018",
        "month" => "Feb",
        "views" => '13080',
        "slugID" => "2018_Feb"
      ),
      array(
        "id" => "3",
        "year" => "2018",
        "month" => "Mar",
        "views" => '15208',
        "slugID" => "2018_Mar"
      ),
      array(
        "id" => "4",
        "year" => "2018",
        "month" => "Apr",
        "views" => '13950',
        "slugID" => "2018_Apr"
      ),
      array(
        "id" => "5",
        "year" => "2018",
        "month" => "May",
        "views" => '7279',
        "slugID" => "2018_May"
      ),
      array(
        "id" => "6",
        "year" => "2018",
        "month" => "June",
        "views" => '0',
        "slugID" => "2018_June"
      ),
      array(
        "id" => "7",
        "year" => "2018",
        "month" => "July",
        "views" => '0',
        "slugID" => "2018_July"
      ),
      array(
        "id" => "8",
        "year" => "2018",
        "month" => "Aug",
        "views" => '0',
        "slugID" => "2018_Aug"
      ),
      array(
        "id" => "9",
        "year" => "2018",
        "month" => "Sept",
        "views" => '0',
        "slugID" => "2018_Sept"
      ),
      array(
        "id" => "10",
        "year" => "2018",
        "month" => "Oct",
        "views" => '0',
        "slugID" => "2018_Oct"
      ),
      array(
        "id" => "11",
        "year" => "2018",
        "month" => "Nov",
        "views" => '0',
        "slugID" => "2018_Nov"
      ),
      array(
        "id" => "12",
        "year" => "2018",
        "month" => "Dec",
        "views" => '0',
        "slugID" => "2018_Dec"
      )
    );
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
