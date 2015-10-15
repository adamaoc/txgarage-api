<?php

class Campaign extends Controller
{

	public function index($id)
	{
		$statsModel = $this->model('StatsModel');
		$campaign = $statsModel->fetch($id);
		$this->api($campaign);
		// $CampaignModel = $this->model('CampaignModel');
		// $campaign = $CampaignModel->fetch($id);
		// $this->api($campaign);
	}

	public function post($payload)
	{
		echo $payload;
	}

  // public function campaigns()
  // {
	// 	$CampaignModel = $this->model('CampaignModel');
	// 	$campaigns = $CampaignModel->getAll();
	//
	// 	$this->api($campaigns);
  // }
	//
	// public function clicks($id)
	// {
	// 	$CampaignModel = $this->model('CampaignModel');
	// 	$allClicks = $CampaignModel->allClicks($id);
	// 	$this->api($allClicks);
	// }
}
