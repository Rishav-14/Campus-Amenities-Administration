<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'scot');
define('DB_PASSWORD', 'tiger');
define('DB_DATABASE', 'landscaping');

$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if ($db === false) {
    die("ERROR: Could not connect. " . $db->connect_error);
}
?>