<?php

class StatsModel
{
  private $_twitterFollowers = null;
  private $_facebookLikes = 925;
  private $_instgramFollows = 755;
  private $_youtubeNumbers = null;

  public function __construct()
  {
      $this->_getTwitter();
      // $this->_getFacebook();
      $this->_getYouTubeSubscribers();
      // $this->_getInstagram();
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
    // $data = file_get_contents('https://graph.facebook.com/txgarage/?fields=likes&access_token='.Config::get('facebook/access_token'));
    // $data = json_decode($data);
    // $this->_facebookLikes = $data->likes;
  }

  private function _getInstagram()
  {
    // $url = 'https://www.instagram.com/txgarage/?__a=1';
    // $apiContents = json_decode(file_get_contents( $url ));
    // $this->_instgramFollows = $apiContents->user->followed_by->count;
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
      $dom = new DOMDocument;
      $dom->loadHTML($button_html);
      $spans = $dom->getElementsByTagName('span');
      if (isset($spans[5]->textContent)) {
        $this->_youtubeNumbers = $spans[5]->textContent;
      } else {
        $this->_youtubeNumbers = 'error';
      }
    }
  }

}
