<?php

class Newsletter extends Controller
{

  public function index()
  {
    $newsletterModel = $this->model('NewsletterModel');
    $stats = $newsletterModel->getAll();

		$this->api($stats, 'newsletter');
  }

}
