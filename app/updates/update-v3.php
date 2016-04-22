<?php

echo "Welcome to the V3 update<br>";
echo "adding `monthlyviews` table<br>";

$SQL = "CREATE TABLE IF NOT EXISTS monthlyviews (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,year INT(8) NOT NULL,month VARCHAR(20) NOT NULL,views INT(180) NOT NULL, slugID VARCHAR(180) UNIQUE NOT NULL)";

$db = DB::getInstance();
$db->query($SQL);

$yearArr = array(2015, 2016);
$monthArr = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
$statsArr = array(
  2015 => array(9876,8932,9134,7643,9952,9956,9614,10340,10928,11045,8546,25008),
  2016 => array(15138,18064,18439,10010,0,0,0,0,0,0,0,0)
);


echo '<pre>';
foreach ($yearArr as $year) {
  $i = 0;
  foreach ($monthArr as $month) {
    echo $year . ' ' . $month . ' <strong>' . $statsArr[$year][$i] . '</strong><br>';
    $data = array();
    $data['year'] = $year;
    $data['month'] = $month;
    $data['views'] = $statsArr[$year][$i];
    $data['slugID'] = $year . '_' . $month;
    $db->insert('monthlyviews', $data);
    $i++;
  }
}
echo '</pre>';

echo '<p>completed update</p>';
