<?php

//@$db = mysqli_connect('185.98.131.90', 'abcde1255905', 'qtv9kok8ax') or die('Erreur de //connexion a la base'); 
//mysqli_select_db('abcde1255905',$db) or die ('erreur de selection');

$conn = new mysqli('db5007388847.hosting-data.io', 'dbu398613', 'Tech1337db(#-/+&1337db)', 'dbu398613', '3306');
// Check connection
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
 ?>

