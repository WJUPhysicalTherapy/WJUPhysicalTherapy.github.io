<?php
require_once('Database.php');

$db = new Database('wjuphysicaltherapy.com', 'wjuphysi', 'physical2015', 'wjuphysi_syllabi');

$db->query("SELECT 'classes'.'course_title' FROM 'classes'");
echo $db->numRows();

$db->disconnect();