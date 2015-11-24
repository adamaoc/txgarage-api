<?php
echo "Welcom to the V2 Update";

$SQL = "CREATE TABLE IF NOT EXISTS newsletter (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,name VARCHAR(180) NOT NULL,stat INT(10) NOT NULL,reg_date TIMESTAMP)";

$db = DB::getInstance();
$db->query($SQL);

$data = array();
$data['name'] = 'Subscribers';
$data['stat'] = 84;
$data2['name'] = 'Monthly Sent';
$data2['stat'] = 2;

$db->insert('newsletter', $data);
$db->insert('newsletter', $data2);

// $db = DB::getInstance();
// $db->query('ALTER TABLE clicks ADD clickDate date');

//$this->_db->insert('clicks', $data);
//
