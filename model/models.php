<?php
  function add_chris_craft($part_number, $description) {
    $db = Database::getDB();

    $query = 'INSERT INTO chris_craft(part_number, description) VALUES(:part_number, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':part_number', $part_number);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
    $msg = "$part_number $description";
    return $msg;
  }

  function delete_chris_craft($ID) {
    $db = Database::getDB();

    $query = 'DELETE FROM chris_craft WHERE ID = :ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':ID', $ID);
    $statement->execute();
    $statement->closeCursor();
  }

  function delete_entry($start_id){
    $db = Database::getDB();

    $query = 'DELETE FROM start WHERE start_id = :start_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':start_id', $start_id);
    $statement->execute();
    $statement->closeCursor();
  }

  function get_models() {
    $db = Database::getDB();

    $query = 'SELECT * FROM chris_craft ORDER BY part_number ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $models = $statement->fetchAll();
    $statement->closeCursor();
    return $models;
  }

  function get_entry(){
    $db = Database::getDB();

    $query = 'SELECT * FROM start INNER JOIN stop ON start.start_id=stop.start_id ORDER BY start_time ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $models = $statement->fetchAll();
    $statement->closeCursor();
    return $models;
  }

  function delete_all_start() {
    $db = Database::getDB();

    $query = 'DELETE FROM start';
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
  }

  function delete_all_stop() {
    $db = Database::getDB();

    $query = 'DELETE FROM stop';
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
  }

 ?>
