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

	public function update()
	{
		echo "Updating the app...";
	}

}
