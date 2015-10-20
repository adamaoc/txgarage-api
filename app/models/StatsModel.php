<?php

class StatsModel
{
  private $_twitterFollowers = null;

  public function __construct()
  {
      $this->_getTwitter();
  }

  public function getAll()
	{
    $stats = array(
      array("id"=>1004, "title"=>"Facebook", "slug"=>"facebook", "stat"=>"982", "color"=>"blue", "link"=>"http://facebook.com/txgarage"),
      array("id"=>1005, "title"=>"Twitter", "slug"=>"twitter", "stat"=>$this->_twitterFollowers, "color"=>"light-blue","link"=>"http://twitter.com/txgarage"),
      array("id"=>1006, "title"=>"Instagram", "slug"=>"instagram", "stat"=>"428", "color"=>"green", "link"=>"http://instagram.com/txgarage")
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

  }

  private function _getInstagram()
  {

  }

}
