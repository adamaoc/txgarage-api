<?php

class ClicksModel
{
  private $_db;

  public function fetch($id = null)
  {
    $this->_db = DB::getInstance();
    $query = "SELECT * FROM `clicks` WHERE `campaign` = '{$id}' ORDER BY `datetime`";
    $data = $this->_db->query($query);
    $data = $data->results();
    return $data;
  }
  public function getAll()
  {
    $this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM clicks ORDER BY campaign, datetime');
		$data = $data->results();
		return $data;
  }
  public function postClick($payload = null)
	{
    $objDateTime = new DateTime('NOW');
    echo $objDateTime->format('c'); // ISO8601 formated datetime
		$data = array();
		$data['campaign'] = htmlentities($payload['campaign']);
    // $data['datetime'] = htmlentities($payload['datetime']);
		$data['datetime'] = $objDateTime->format('c');
		$data['page'] = htmlentities($payload['page']);
    $data['clickDate'] = date('l jS \of F Y h:i:s A');

		$this->_db = DB::getInstance();
		$this->_db->insert('clicks', $data);

		return $data;
	}
}
