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
		// print_r($data);

		foreach ($data as $key => $row) {
			$rowClicks = $this->_db->get('clicks', array('campaign', '=', $row->slug));
			$rowClicks = $rowClicks->results();
			$row->totals = count($rowClicks);
			$newData[$key] = $row;
		}

		return $newData;
		// return array(
	  // 	array("id"=>"titan2015", "slug"=>"titan2015", "name"=>"Nissan Titan 2015","startDate"=>"07/01/15","endDate"=>"12/31/15", "totals"=>"20"),
	  // 	array("id"=>"googleAds", "slug"=>"googleAds", "name"=>"Google Ads","startDate"=>"01/01/15","endDate"=>"12/31/15", "totals"=>"20"),
	  // 	array("id"=>"tawa2015", "slug"=>"tawa2015", "name"=>"TAWA 2015","startDate"=>"01/01/15","endDate"=>"12/31/15", "totals"=>"20"),
	  // );
	}

	public function postCampaign($payload)
	{
		$data = array();
		$data['slug'] = $payload['slug'];
		$data['name'] = $payload['name'];
		$data['startDate'] = $payload['startDate'];
		$data['endDate'] = $payload['endDate'];

		$this->_db = DB::getInstance();
		$this->_db->insert('campaigns', $data);

		return $data;
	}

  public function allClicks($campaign = null)
  {
    $allClicks = array(
        array("campaign"=>"titan2015","clicks"=> array(
          array("date"=> "06/30/15",
          "page"=> "sponsors",
          "timestamp"=> "1435665503677"),
          array("date"=> "06/30/15",
          "page"=> "sponsors",
          "timestamp"=> "1435665503677"),
        )),
        array("campaign"=>"googleAds","clicks"=> array(
          array("date"=> "06/30/15",
          "page"=> "homepage",
          "timestamp"=> "1435665503677"),
          array("date"=> "06/30/15",
          "page"=> "homepage",
          "timestamp"=> "1435665503677"),
        ))
    );

    if($campaign) {
      foreach ($allClicks as $click) {
  			if($click['campaign'] == $campaign) {
  				return $click;
  			}
  		}
    }else{
      return $allClicks;
    }

  }
}
