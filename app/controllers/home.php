<?php

class Home extends Controller
{

	public function index()
	{
		$name = "You must hit a valid endpoint.";
		echo $name;
	}

	public function setup()
	{
		echo "Time to setup the api<br>";
		$setup = new Setup;
	}

	public function update($version)
	{
		echo "Updating the app...";
		echo $version;
		echo "<br />";
		if($version == 'v2') {
			echo "entering v2 update<br>";
			require_once($_SERVER['DOCUMENT_ROOT'].'/app/updates/update-v2.php');
		}
	}
	public function tests()
	{
		echo date('l jS \of F Y h:i:s A');
	}

	public function twitter()
	{
		echo "twitter ";
		$twitter = new Twitter;
		echo $twitter->getFollowerCount();
	}

}
