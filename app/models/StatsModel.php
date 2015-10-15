<?php

class StatsModel
{

  public function fetch($id)
	{
		$all = $this->getAll();
		foreach ($all as $camp) {
			if($camp['id'] == $id) {
				return $camp;
			}
		}
		return "No campaign found.";
	}

  public function getAll()
	{
    $stats = array(
      // array("id"=>1001, "title"=>"Views", "time"=>"Today", "stat"=>"982", "footer"=>"view more stats", "color"=> "gray"),
      // array("id"=>1002, "title"=>"Campaigns", "time"=>"Month", "stat"=>"982", "footer"=>"view more stats", "color"=> "green", "link"=>"campaigns"),
      // array("id"=>1003, "title"=>"Published Articles", "time"=>"Month", "stat"=>"5", "footer"=>"view more stats", "color"=>"light-blue"),
      array("id"=>1004, "title"=>"Facebook", "time"=>"Month", "stat"=>"982", "footer"=>"view facebook", "color"=>"blue", "link"=>"http://facebook.com/txgarage"),
      array("id"=>1005, "title"=>"Twitter", "time"=>"Month", "stat"=>"18.6k", "footer"=>"view twitter", "color"=>"light-blue", "link"=>"http://twitter.com/txgarage"),
      array("id"=>1006, "title"=>"Instagram", "time"=>"Month", "stat"=>"428", "footer"=>"view instagram", "color"=>"green", "link"=>"http://instagram.com/txgarage")
    );
		return $stats;
	}

}
