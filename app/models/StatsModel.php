<?php

class StatsModel
{
  private $_twitterFollowers = null;
  private $_facebookLikes = null;
  private $_instgramFollows = 784;

  public function __construct()
  {
      $this->_getTwitter();
      $this->_getFacebook();
      // $this->_getInstagram(); need to fix api...
  }

  public function getAll()
	{
    $stats = array(
      array("id"=>1004, "title"=>"Facebook", "slug"=>"facebook", "stat"=>$this->_facebookLikes, "color"=>"blue", "link"=>"http://facebook.com/txgarage"),
      array("id"=>1005, "title"=>"Twitter", "slug"=>"twitter", "stat"=>$this->_twitterFollowers, "color"=>"light-blue","link"=>"http://twitter.com/txgarage"),
      array("id"=>1006, "title"=>"Instagram", "slug"=>"instagram", "stat"=>$this->_instgramFollows, "color"=>"green", "link"=>"http://instagram.com/txgarage")
    );
		return $stats;
	}

  private function _getTwitter()
  {
    $twitter = new Twitter;
		$this->_twitterFollowers = $twitter->getFollowerCount();
  }

  private function _getFacebook()
  {
    $data = file_get_contents('https://graph.facebook.com/txgarage/?fields=likes&access_token='.Config::get('facebook/access_token'));
    $data = json_decode($data);
    $this->_facebookLikes = $data->likes;
  }

  private function _getInstagram()
  {
    $data = file_get_contents('https://api.instagram.com/v1/users/1648915262/?client_id='.Config::get('instagram/client_id'));
    $data = json_decode($data);
    $this->_instgramFollows = $data->data->counts->followed_by;

  }

}
