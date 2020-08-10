<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=esp', 'root', '');
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
