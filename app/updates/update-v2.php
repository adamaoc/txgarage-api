<?php
echo "Welcom to the V2 Update";

$db = DB::getInstance();
// $db->query('ALTER TABLE clicks ADD clickDate date');

$fixDatetime = "ALTER TABLE `clicks` CHANGE `datetime` `datetime` DATETIME NOT NULL";
$fixClickDate = "ALTER TABLE `clicks` CHANGE `clickDate` `clickDate` VARCHAR(201) CHARACTER";
$db->query($fixDatetime);
$db->query($fixClickDate);

//ALTER TABLE `clicks` CHANGE `datetime` `datetime` DATETIME NOT NULL;
//ALTER TABLE `clicks` CHANGE `clickDate` `clickDate` VARCHAR(201) CHARACTER;
