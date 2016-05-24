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
      $events = $eventsModel->getAll();
  		$this->api($events, 'events');
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
