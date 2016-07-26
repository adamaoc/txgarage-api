<?php

class Newsletters extends Controller
{

  public function index()
  {
    $newsletterModel = $this->model('NewsletterModel');
    $stats = $newsletterModel->getRecent();

		$this->api($stats, 'newsletter');
  }

  public function all()
  {
    $newsletterModel = $this->model('NewsletterModel');
    $stats = $newsletterModel->getAll();

		$this->api($stats, 'newsletters');
  }

  public function post()
  {
    header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Key");

    $json = @file_get_contents('php://input');
    $array = json_decode($json, true);

    $newsletterModel = $this->model('NewsletterModel');
    $newsletter = $newsletterModel->postNew($array);

    $this->api($newsletter, 'newsletter', 201);
  }

}
