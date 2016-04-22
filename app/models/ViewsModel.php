<?php

class ViewsModel
{
	private $_db;

	public function getAll()
	{
		$this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM monthlyviews');
		$data = $data->results();
		return $data;
	}

	public function postViews($payload)
	{
    $allData = $this->getAll();
    $postID = 'nope';

    foreach ($allData as $data) {
      $totalViews = $payload['data']['views'];
      $slug = $payload['data']['year'] . '_' . $payload['data']['month'];
      if($data->slugID === $slug) {
        $postID = $data->id;
      }
    }

		$this->_db = DB::getInstance();
    $this->_db->update('monthlyviews', $postID, array('views' => $totalViews));

    $respData = array();
    $respData['id'] = $postID;
    $respData['month'] = $payload['data']['month'];
    $respData['year'] = $payload['data']['year'];
    $respData['views'] = $payload['data']['views'];
    $respData['error'] = $this->_db->error();
		return $respData;
	}


}
