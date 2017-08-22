<?php

class StatsModel
{
  private $_twitterFollowers = null;
  private $_facebookLikes = null;
  private $_instgramFollows = 755;
  private $_youtubeNumbers = null;

  public function __construct()
  {
      $this->_getTwitter();
      $this->_getFacebook();
      $this->_getYouTubeSubscribers();
      // $this->_getInstagram(); need to fix api...
  }

  public function getAll()
	{
    $stats = array(
      array("id"=>1004, "title"=>"Facebook", "slug"=>"facebook", "stat"=>$this->_facebookLikes, "color"=>"blue", "link"=>"http://facebook.com/txgarage"),
      array("id"=>1005, "title"=>"Twitter", "slug"=>"twitter", "stat"=>$this->_twitterFollowers, "color"=>"light-blue","link"=>"http://twitter.com/txgarage"),
      array("id"=>1006, "title"=>"Instagram", "slug"=>"instagram", "stat"=>$this->_instgramFollows, "color"=>"green", "link"=>"http://instagram.com/txgarage"),
      array("id"=>1007, "title"=>"YouTube", "slug"=>"youtube", "stat"=>$this->_youtubeNumbers, "color"=>"red", "link"=>"http://youtube.com/user/texasgarage")
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
  private function _getYouTubeSubscribers()
  {
    // Change channelid value to match your YouTube channel ID
    $url = 'https://www.youtube.com/subscribe_embed?channelid=UCckngdLzBfaBKqcjj3VkxcA';

    // Fetch the Subscribe button HTML
    $button_html = file_get_contents( $url );

    // Extract the subscriber count
    $found_subscribers = preg_match( '/="0">(\d+)</i', $button_html, $matches );

    if ( $found_subscribers && isset( $matches[1] ) ) {
        $this->_youtubeNumbers = intval( $matches[1] );
    } else {
      $this->_youtubeNumbers = 'error';
    }
  }

}
