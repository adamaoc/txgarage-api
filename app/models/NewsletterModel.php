<?php

class NewsletterModel
{

  private $_db;

  public function getAll()
	{
    $this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM newsletters');
		$data = $data->results();
		return $data;
	}

  public function getRecent()
  {
    $this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM newsletters ORDER BY ID DESC LIMIT 1');
		$data = $data->results();
		return $data[0];
  }

  public function postNew($payload)
	{
    $newsletter = $payload['data'];
    $this->_db = DB::getInstance();
    $newsletter['updated'] = date('Y-m-d');
    $this->_db->insert('newsletters', $newsletter);

    return $newsletter;
  }

  public function updateStats($payload)
  {
    $stats = $payload['data'];
    $this->_db = DB::getInstance();
    $updatedDate = date('Y-m-d');
    $prevStats = $this->_db->query('SELECT * FROM newsletters ORDER BY ID DESC LIMIT 1');
    $prevStats = $prevStats->results();
    $statID = $prevStats[0]->id;

    $updatedStats = array();
    foreach ($stats as $key => $value) {
      if ($key != 'id') {
        $updatedStats[$key] = $stats[$key];
      }
    }
    $updateStats['updated'] = $updatedDate;

    $this->_db = DB::getInstance();
    $this->_db->update('newsletters', $statID, $updatedStats);

    $newsletterStats = $this->_db->query('SELECT * FROM newsletters ORDER BY ID DESC LIMIT 1');
    return $newsletterStats->results();
  }
}

// JSON example //
// {
//     "data": {
//         "subscribers": 85,
//         "campaigns": 102,
//         "opens": 44.3
//     }
// }
