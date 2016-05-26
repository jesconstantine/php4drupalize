<?php

// load composer packages automatically
require './vendor/autoload.php';

function get_pets($limit = null) {
  $config = require 'lib/config.php';

  $pdo = new PDO(
    $config['database_dsn'],
    $config['database_user'],
    $config['database_pass']
  ); // PDO class, returns pdo object we store in $pdo
  //d($pdo);die;
  // WAIT! TODO - This is a security hole!
  $query = 'SELECT * FROM pet';
  if ($limit) {
    $query .= ' LIMIT ' . $limit;
  }
  $result = $pdo->query($query); // use query method of pdo obj
  $pets = $result->fetchAll();
  //d($rows);die;
  return $pets;
}

function save_pets($petsToSave) {
  //d($petsToSave); die;
  $json = json_encode($petsToSave, JSON_PRETTY_PRINT);
  file_put_contents('data/pets.json', $json);
}