<?php

//@$db = mysqli_connect('185.98.131.90', 'abcde1255905', 'qtv9kok8ax') or die('Erreur de //connexion a la base'); 
//mysqli_select_db('abcde1255905',$db) or die ('erreur de selection');

$conn = new mysqli('db5007388847.hosting-data.io', 'abcde1255905', 'qtv9kok8ax', 'abcde1255905');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 ?>


