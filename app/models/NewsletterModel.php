<?php

class NewsletterModel
{

  private $_db;

  public function getAll()
	{
    $this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM newsletter');
		$data = $data->results();
		return $data;
	}
}
