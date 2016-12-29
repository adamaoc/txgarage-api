<?php

class Schedule extends Controller
{

  public function index($id = 0)
  {
    $scheduleModel = $this->model('ScheduleModel');
    $schedule = $scheduleModel->getAll();
    $this->api($schedule, 'schedule');
  }

  public function all()
  {
    $scheduleModel = $this->model('ScheduleModel');
    $schedule = $scheduleModel->getAll();
    $this->api($schedule, 'schedule');
  }

  public function brand($brand = 'acura')
  {
    $scheduleModel = $this->model('ScheduleModel');
    $schedule = $scheduleModel->byBrand($brand);
    $this->api($schedule, 'schedule');
  }

  public function brands()
  {
    $scheduleModel = $this->model('ScheduleModel');
    $brands = $scheduleModel->getAllBrands();
    $this->api($brands, 'brands');
  }

  public function company($company = 'esi')
  {
    $scheduleModel = $this->model('ScheduleModel');
    $schedule = $scheduleModel->byCompany($company);
    $this->api($schedule, 'schedule');
  }

  public function companies()
  {
    $scheduleModel = $this->model('ScheduleModel');
    $companies = $scheduleModel->getAllCompanies();
    $this->api($companies, 'companies');
  }

  public function author($author = 'adamaoc')
  {
    $scheduleModel = $this->model('ScheduleModel');
    $schedule = $scheduleModel->byAuthor($author);
    $this->api($schedule, 'schedule');
  }

  public function authors()
  {
    $scheduleModel = $this->model('ScheduleModel');
    $authors = $scheduleModel->getAllAuthors();
    $this->api($authors, 'authors');
  }
}
