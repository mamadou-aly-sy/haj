<?php

require '../database/db.php';

$id = $_GET['id'];

$requette = 'DELETE FROM utilisateur WHERE IDUSER = :id';

$statement = $db->prepare($requette);
if ($statement->execute([':id' => $id])) {
    header('location:../pages/listes_users.php');
}
