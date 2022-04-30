<?php
$host_name = 'db5007388847.hosting-data.io';
$db = 'dbs6088556';
$user = 'dbu398613';
$pwd = 'Tech1337db(#-/+&1337db)';
$conn = null;
  try {
    $conn = new PDO("mysql:host=$host_name; dbname=$db;", $user, $pwd);
  } catch (PDOException $e) {
    echo "Erreur!:" . $e->getMessage() . "<br/>";
    die();
  }

