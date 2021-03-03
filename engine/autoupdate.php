<?php

const SERVER = "localhost";
const DB = "gb_test";
const LOGIN = "root";
const PASS = "root";

$connect = mysqli_connect(SERVER,LOGIN,PASS,DB);

$offset = is_numeric($_POST['offset']) ? $_POST['offset'] : die();
$postnumbers = is_numeric($_POST['number']) ? $_POST['number'] : die();


$run = mysql_query("SELECT * FROM goods ORDER BY id_good DESC LIMIT ".$postnumbers." OFFSET ".$offset);


while($row = mysql_fetch_array($run)) {

    $content = substr(strip_tags($row['text']), 0, 500);

    echo '<h1><a href="#">'.$row['title'].'</a></h1><hr />';
    echo '<p>'.$content.'...</p><hr />';

}

?>