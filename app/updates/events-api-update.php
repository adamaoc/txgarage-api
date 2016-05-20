<?php

echo "Welcome to the Events update<br>";
echo "adding `events` table<br>";

$SQL = "CREATE TABLE IF NOT EXISTS events (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,title VARCHAR(200) NOT NULL,city VARCHAR(100) NOT NULL,address VARCHAR(200), startDate DATE NOT NULL, endDate DATE, time TIME, details TEXT, weblink VARCHAR(200), tags VARCHAR(200), coverPhoto TEXT, showFlyer TEXT )";

$db = DB::getInstance();
$db->query($SQL);

/*

INSERT INTO `stats`.`events` (`id`, `title`, `city`, `address`, `startDate`, `endDate`, `time`, `details`, `weblink`, `tags`, `coverPhoto`, `showFlyer`) VALUES (NULL, 'New Event', 'Dallas', '1234 Dallas Blvd', '2016-05-18', '2016-05-18', '08:00:00', 'Here is a little bit more detail on what''s going on!
<p>I should be able to parse some HTML also so <strong>Check</strong> this out!</p>', 'http://txgarage.com', 'old school, exotics, fun stuff', '{ "thumb": "http://lorempixel.com/100/100", "medium": "http://lorempixel.com/400/200", "large": "http://lorempixel.com/600/400" }', NULL);

*/
echo '<p>completed update</p>';
