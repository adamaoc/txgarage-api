<?php

class CampaignModel
{
	private $_db;

	public $name;

	public function fetch($id)
	{
		$this->_db = DB::getInstance();
		$data = $this->_db->get('campaigns', array('slug', '=', $id));
		$data = $data->results();
		$data = $data[0];

		$clicks = $this->_db->get('clicks', array('campaign', '=', $id));
		$clicks = $clicks->results();
		$data->totals = count($clicks);

		return array($data);
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
