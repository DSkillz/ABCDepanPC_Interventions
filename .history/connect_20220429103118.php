<?php

function console_log($data, $add_script_tags = false)
{
  $command = 'console.log(' . json_encode($data, JSON_HEX_TAG) . ');';
  if ($add_script_tags) {
    $command = '<script>' . $command . '</script>';
  }
  echo $command;
} 

$host = 'db5007388847.hosting-data.io';
$db = 'dbs6088556';
$user = 'dbu398613';
$pwd = 'Tech1337db(#-/+&1337db)';
$conn = null;
  try {
    $conn = new PDO("mysql:host=$host; dbname=$db;", $user, $pwd);
    console_log("req ok !");
  } catch (PDOException $e) {
    echo "Erreur!:" . $e->getMessage() . "<br/>";
    die();
  }
?>