<?php

class Campaigns extends Controller
{

  public function index($id = null)
	{
    $campModel = $this->model('CampaignModel');
    if($id) {
  		$campaign = $campModel->fetch($id);
  		$this->api($campaign, 'campaign');
    }else{
      $campaigns = $campModel->getAll();
      $this->api($campaigns, 'campaigns');
    }
	}

  public function post()
  {
    $campModel = $this->model('CampaignModel');
    // echo "stuff";
    $campaigns = $campModel->postCampaign($_POST);

    $this->api($campaigns, 'campaigns');
  }

}
