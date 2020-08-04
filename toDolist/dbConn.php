<?php

$db = new mysqli('us-cdbr-east-02.cleardb.com', 'bbd0be6fcc732c', '44396069', 'heroku_61175c1ed6f6c8a');

if ($db->connect_error) {
    echo "$db->connect_error";
    die("Connection Failed : " . $db->connect_error);
} 

?>