<?php
function logText($text) { echo "<p><code>" . $text ."</code></p>"; }
// Setting up the Review Schedule API database //

logText("Setting up the Review Schedule API database");
logText("adding `reviewschedule` table");

$SQL = "CREATE TABLE IF NOT EXISTS reviewschedule (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  startDate DATE,
  endDate DATE,
  publishedDate DATE,
  year INT(4),
  make VARCHAR(180),
  model VARCHAR(180),
  eventCompany VARCHAR(180),
  reviewLink VARCHAR(180),
  reviewTitle VARCHAR(200),
  status VARCHAR(15),
  authorSlug VARCHAR(150) NULL,
  authorName VARCHAR(200) NULL
)";

$db = DB::getInstance();
$db->query($SQL);

logText("Setup Complete");
