<?php

class ClicksModel
{
  private $_db;

  public function fetch($id)
  {
    $this->_db = DB::getInstance();
    $data = $this->_db->get('clicks', array('campaign', '=', $id));
    $data = $data->results();
    return $data;
  }
  public function getAll()
  {
    $this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM clicks');
		$data = $data->results();
		return $data;
  }
  public function postClick($payload)
	{
		$data = array();
		$data['campaign'] = $payload['campaign'];
		$data['datetime'] = $payload['datetime'];
		$data['page'] = $payload['page'];

		$this->_db = DB::getInstance();
		$this->_db->insert('clicks', $data);

		return $data;
	}
}
