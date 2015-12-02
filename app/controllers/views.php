<?php

class Views extends Controller
{

  public function index()
  {
    $monthArr = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
    $statsArr2016 = array('jan' => 11652,
                          'feb' => 10524,
                          'mar' => 9862,
                          'apr' => 10010,
                          'may' => 9952,
                          'jun' => 9956,
                          'jul' => 9614,
                          'aug' => 10340,
                          'sep' => 10928,
                          'oct' => 11045,
                          'nov' => 8546,
                          'dec' => 295);
    $stats = array(
      'id' => 1001,
      'labels'  => $monthArr,
      'datasets' => array(
        array(
          'label' => 'Views Per Month',
          'fillColor' => "rgba(220,220,220,0.8)",
          'strokeColor' => "rgba(220,220,220,0.8)",
          'highlightFill' => "rgba(45,124,185,0.75)",
          'highlightStroke' => "rgba(220,220,220,1)",
          'data' => $statsArr2016
        )
      )
    );
		$this->api($stats, 'views');
  }

}
