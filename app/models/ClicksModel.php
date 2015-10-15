<?php

class ClicksModel
{
  private $_db;

  public function fetch($id = null)
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
  public function postClick($payload = null)
	{
		$data = array();
		$data['campaign'] = htmlentities($payload['campaign']);
		$data['datetime'] = htmlentities($payload['datetime']);
		$data['page'] = htmlentities($payload['page']);

		$this->_db = DB::getInstance();
		$this->_db->insert('clicks', $data);

		return $data;
	}
}
