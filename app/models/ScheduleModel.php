<?php

class ScheduleModel
{
	private $_db;

	public function getAll()
	{
		$this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM reviewschedule ORDER BY `startDate`');
		$data = $data->results();
		return $data;
	}

	public function getAllBrands()
	{
		$this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM reviewschedule ORDER BY `startDate`');
		$data = $data->results();
		sort($data);
		$brands = array();
		foreach ($data as $event) {
			if (!in_array($event->make, $brands)) {
				array_push($brands, $event->make);
			}
		}
		return $brands;
	}

	public function byBrand($brand)
	{
		$this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM reviewschedule WHERE `make` = "'.$brand.'" ORDER BY `startDate`');
		$data = $data->results();
		return $data;
	}

	public function getAllCompanies()
	{
		$this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM reviewschedule ORDER BY `startDate`');
		$data = $data->results();
		$companies = array();

		foreach ($data as $event) {
			if (!in_array($event->eventCompany, $companies)) {
				array_push($companies, $event->eventCompany);
			}
		}
		return $companies;
	}

	public function byCompany($company)
	{
		$this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM reviewschedule WHERE `eventCompany` = "'.$company.'" ORDER BY `startDate`');
		$data = $data->results();
		return $data;
	}

	public function getAllAuthors()
	{
		$this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM reviewschedule ORDER BY `startDate`');
		$data = $data->results();
		$authors = array();
		$authorsData = array();

		foreach ($data as $event) {
			if (!in_array($event->authorSlug, $authors)) {
				array_push($authors, $event->authorSlug);
				array_push($authorsData, array('slug' => $event->authorSlug, 'display' => $event->authorName));
			}
		}
		return $authorsData;
	}

	public function byAuthor($author)
	{
		$this->_db = DB::getInstance();
		$data = $this->_db->query('SELECT * FROM reviewschedule WHERE `authorSlug` = "'.$author.'" ORDER BY `startDate`');
		$data = $data->results();
		return $data;
	}
}
