<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

$query = "SELECT * FROM tm_users";

$db = new Database;

$result = $db->query($query);

foreach($result as $row) {
    echo $row['username'];
}
