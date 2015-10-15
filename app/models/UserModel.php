<?php

class UserModel
{
	public $name;

	public function getUser($id)
	{
		$users = $this->getUsers();
		foreach ($users as $user) {
			if($user['id'] == $id) {
				return $user;
			}
		}
		return "No user found.";
	}

	public function getUsers()
	{
		return array(
	  	array("id"=>"PEU33CQK2QT","name"=>"Coby Mcbride","email"=>"justo.faucibus.lectus@Aeneanmassa.net","phone"=>"1-187-475-2845"),
	  	array("id"=>"SMQ61SKJ0NR","name"=>"Zachery Sims","email"=>"molestie@sapien.co.uk","phone"=>"353-1227"),
	  	array("id"=>"FQO67EPH6MG","name"=>"Marvin Yang","email"=>"lorem.semper@necmalesuadaut.edu","phone"=>"658-5226"),
	  	array("id"=>"FFT87RJJ9NC","name"=>"Leonard Mcguire","email"=>"libero.at.auctor@aliquet.edu","phone"=>"801-0846"),
	  	array("id"=>"MYY76ODV6HU","name"=>"Rooney Schultz","email"=>"facilisi.Sed@eleifendnec.ca","phone"=>"104-5317"),
	  	array("id"=>"VSR79AEC8AL","name"=>"Gregory Vaughn","email"=>"Nunc@aceleifend.org","phone"=>"445-9434")
	  );
	}
}
