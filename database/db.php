<?php
//connessione al database
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "password");
define("DATABASE", "mysmartopinion");


$db = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
if ($db->connect_error) {
    die ("Error while trying to connect to database: " . $db->connect_error);
}
return $db;

?>