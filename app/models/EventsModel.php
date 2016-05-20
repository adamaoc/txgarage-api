<?php

class EventsModel
{
	private $_db;

	public function getAll()
	{
		$this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM events');
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
