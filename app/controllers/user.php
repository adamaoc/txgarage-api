<?php

class User extends Controller
{

	public function index($id = "")
	{
		if($id !== ""){
			$user = $this->model('UserModel');
			$single = $user->getUser($id);
			$this->api($single);
		}else{
			$message = "You must hit a valid endpoint.";
			echo $message;
		}
	}

	public function users()
	{
		$user = $this->model('UserModel');
		$users = $user->getUsers();
		$this->api($users);
	}

}
