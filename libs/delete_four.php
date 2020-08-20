<?php

require '../database/db.php';

$id = $_GET['id'];

$requette = 'DELETE FROM fournisseur WHERE IDFOURNISSEUR = :id';

$statement = $db->prepare($requette);
if ($statement->execute([':id' => $id])) {
    header('location:../pages/listes_four.php');
}
