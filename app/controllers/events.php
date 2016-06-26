<?php

class Events extends Controller
{

  public function index($id = 0)
  {
    $eventsModel = $this->model('EventsModel');
    if($id !== 0) {
      $event = $eventsModel->getEvent($id);
      $this->api($event, 'event');
    } else {
      $events = $eventsModel->getLatest();
  		$this->api($events, 'events');
    }
  }

  public function all()
  {
    $eventsModel = $this->model('EventsModel');
    $events = $eventsModel->getAll();
    $this->api($events, 'events');
  }

  public function range($start, $end)
  {
    $eventsModel = $this->model('EventsModel');
    $events = $eventsModel->getDateRange($start, $end);
    $this->api($events, 'events');
  }

  public function majorcity($majorCity)
  {
    $eventsModel = $this->model('EventsModel');
    $events = $eventsModel->getByMajorCity($majorCity);
    $this->api($events, 'events');
  }

  public function city($city)
  {
    $eventsModel = $this->model('EventsModel');
    $events = $eventsModel->getByCity($city);
    $this->api($events, 'events');
  }

  public function query()
  {
    if (count($_GET) > 1) {
      $eventsModel = $this->model('EventsModel');
      $events = $eventsModel->buildQuery($_GET);
      $this->api($events, 'events');
    } else {
      echo "You must provide the correct query";
    }
  }

  public function post()
  {
    header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Key");

    $json = @file_get_contents('php://input');
    $array = json_decode($json, true);

    $eventsModel = $this->model('EventsModel');
    $event = $eventsModel->postEvent($array);

    $this->api($event, 'event', 201);
  }

  public function update()
  {
    header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Key");
    $json = @file_get_contents('php://input');
    $array = json_decode($json, true);

    $eventsModel = $this->model('EventsModel');
    $updated = $eventsModel->updateEvent($array);

    $this->api($updated, 'updated-event', 201);
  }

  public function delete()
  {
    header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Key");
    $json = @file_get_contents('php://input');
    $array = json_decode($json, true);

    $eventsModel = $this->model('EventsModel');
    $deleted = $eventsModel->deleteEvent($array);

    $this->api($deleted, 'deleted-event', 201);
  }

}
