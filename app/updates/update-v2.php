<?php
echo "Welcom to the V2 Update";

$db = DB::getInstance();
$db->query('ALTER TABLE clicks ADD clickDate date');
