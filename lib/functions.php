<?php

// load composer packages automatically
require './vendor/autoload.php';

function get_pets() {
  $config = require 'lib/config.php';

  $pdo = new PDO(
    $config['database_dsn'],
    $config['database_user'],
    $config['database_pass']
  ); // PDO class, returns pdo object we store in $pdo
  //d($pdo);die;
  $result = $pdo->query('SELECT * FROM pet'); // use query method of pdo obj
  $pets = $result->fetchAll();
  //d($rows);die;
  return $pets;
}

function save_pets($petsToSave) {
  //d($petsToSave); die;
  $json = json_encode($petsToSave, JSON_PRETTY_PRINT);
  file_put_contents('data/pets.json', $json);
}