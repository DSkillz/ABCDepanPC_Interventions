<?php
$host_name = 'db5007388847.hosting-data.io';
$database = 'dbs6088556';
$user_name = 'dbu398613';
$password = 'Tech1337db(#-/+&1337db)';

$conn = new mysqli($host_name, $user_name, $password, $database);

$dbh = null;

  try {
    $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
  } catch (PDOException $e) {
    echo "Erreur!:" . $e->getMessage() . "<br/>";
    die();
  }

