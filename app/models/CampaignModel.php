<?php

class CampaignModel
{
	private $_db;

	public $name;

	public function fetch($id)
	{
		$this->_db = DB::getInstance();
		$data = $this->_db->get('campaigns', array('id', '=', $id));
		$data = $data->results();

		return $data;
	}

	public function getAll()
	{
		$this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM campaigns');
		$data = $data->results();

		$newData = array();

		foreach ($data as $key => $row) {
			$rowClicks = $this->_db->get('clicks', array('campaign', '=', $row->slug));
			$rowClicks = $rowClicks->results();
			$row->totals = count($rowClicks);
			$newData[$key] = $row;
		}

		return $newData;
	}

	public function postCampaign($payload)
	{
		$data = array();
		$data['slug'] = htmlentities($payload['slug']);
		$data['name'] = htmlentities($payload['name']);
		$data['startDate'] = htmlentities($payload['startDate']);
		$data['endDate'] = htmlentities($payload['endDate']);

		$this->_db = DB::getInstance();
		$this->_db->insert('campaigns', $data);

		return $data;
	}

}
