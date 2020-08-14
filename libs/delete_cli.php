<?php

require '../database/db.php';

$id = $_GET['id'];

$requette = 'DELETE FROM client WHERE NUM_CLIENT = :id';

$statement = $db->prepare($requette);
if ($statement->execute([':id' => $id])) {
    header('location:../pages/listes_cli.php');
}
