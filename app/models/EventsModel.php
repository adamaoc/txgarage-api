<?php

class EventsModel
{
	private $_db;

	public function getAll()
	{
		$this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM events ORDER BY `startDate`');
		$data = $data->results();
		return $data;
	}

	public function getLatest()
	{
		$this->_db = DB::getInstance();
		$query = "SELECT * FROM `events` WHERE `startDate` >= curDate() AND `status` = 1 ORDER BY `startDate` LIMIT 20";
		$data = $this->_db->query($query);
		$data = $data->results();
		return $data;
	}

	public function getByCity($city)
	{
		$this->_db = DB::getInstance();
		$query = "SELECT * FROM `events` WHERE `citySlug` = '".$city."' AND `startDate` >= curDate() AND `status` = 1 ORDER BY `startDate` LIMIT 20";
		$data = $this->_db->query($query);
		$data = $data->results();
		return $data;
	}

	public function getByMajorCity($majorCity)
	{
		$this->_db = DB::getInstance();
		$query = "SELECT * FROM `events` WHERE `closeMetro` = '".$majorCity."' AND `startDate` >= curDate() AND `status` = 1 ORDER BY `startDate` LIMIT 20";
		$data = $this->_db->query($query);
		$data = $data->results();
		return $data;
	}

	public function getDateRange($startDate, $endDate)
	{
		$this->_db = DB::getInstance();
		$query = "SELECT * FROM `events` WHERE `startDate` BETWEEN '". $startDate ."' AND '". $endDate ."' AND `status` = 1 ORDER BY `startDate` LIMIT 20";
		$data = $this->_db->query($query);
		$data = $data->results();
		return $data;
	}

  public function getEvent($id)
  {
    $this->_db = DB::getInstance();
    $query = "SELECT * FROM events WHERE id = " . $id;
    $data = $this->_db->query($query);

    return $data->results();
  }

	public function buildQuery($getQuery)
	{
		if ($getQuery['city'])
		{
			$city = $getQuery['city'];
		}
		if ($getQuery['metro'])
		{
			$metro = $getQuery['metro'];
		}
		if ($getQuery['start'])
		{
			$start = $getQuery['start'];
		}
		if ($getQuery['end'])
		{
			$end = $getQuery['end'];
		}
		$query = $this->_builder($city, $metro, $start, $end);
		$this->_db = DB::getInstance();
		$data = $this->_db->query($query);
		$data = $data->results();
		return $data;
	}

	private function _builder($city = false, $metro = false, $start = false, $end = false)
	{
		if ($city && $start && $end) {
			return "SELECT * FROM `events` WHERE `startDate` BETWEEN '". $start ."' AND '". $end ."' AND `citySlug` = '".$city."' AND `status` = 1 ORDER BY `startDate` LIMIT 20";
		}
		if ($city && $start) {
			return "SELECT * FROM `events` WHERE `startDate` >= '". $start ."' AND `citySlug` = '".$city."' AND `status` = 1 ORDER BY `startDate` LIMIT 20";
		}
		if ($metro && $start && $end) {
			return "SELECT * FROM `events` WHERE `closeMetro` = '".$metro."' AND `startDate` BETWEEN '". $start ."' AND '". $end ."' AND `status` = 1 ORDER BY `startDate` LIMIT 20";
		}
		if ($metro && $start) {
			return "SELECT * FROM `events` WHERE `startDate` >= '". $start ."' AND `closeMetro` = '".$metro."' AND `status` = 1 ORDER BY `startDate` LIMIT 20";
		}
		return false;
	}

	public function postEvent($payload)
	{
    $event = $payload['data'];
    $this->_db = DB::getInstance();

    $this->_db->insert('events', $event);

    return $event;
    /* Example data for Posting an Event
    {
      "data": {
        "title": "Another New Event",
        "city": "Dallas",
        "address": "9876 Another St.",
        "startDate": "2016-05-18",
        "endDate": "2016-05-18",
        "time": "08:00:00",
        "details": "short deets"
      }
    }
    */
	}

  public function updateEvent($payload)
  {
    $eventID = $payload['data']['id'];
    $eventData = $payload['data'];

    $updatedEvent = array();
    foreach ($eventData as $key => $value) {
      if ($key != 'id') {
        $updatedEvent[$key] = $eventData[$key];
      }
    }

    $this->_db = DB::getInstance();
    $this->_db->update('events', $eventID, $updatedEvent);

    return $eventData;

    /* // postman data example for updating event
      {
        "data": {
          "id": "2",
          "weblink": "http://google.com"
        }
      }
    */
  }

  public function deleteEvent($payload)
  {
    $eventID = $payload['data']['id'];
    $eventData = $payload['data'];

    $this->_db = DB::getInstance();
    $this->_db->delete('events', array('id', '=', $eventID));

    return $eventData;
  }

}
