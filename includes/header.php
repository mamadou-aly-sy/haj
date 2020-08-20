<?php
session_start();
function dump($element)
{
  echo "<pre>";
  print_r($element);
  echo "</pre>";
  die();
}
require '../database/db.php';
if (!isset($_SESSION["PROFIL"])) {
  header('Location: ../index.php');
}
$user = $_SESSION['PROFIL'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/all.css">
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="../js/babel.js"></script>
  <script src="../js/react.js"></script>
  <script src="../js/react-dom.js"></script>
  <title>
    <?php if (isset($title)) : ?>
      <?= $title ?>
    <?php else : ?>
      <?= "App" ?>
    <?php endif ?>
  </title>
</head>

<body class="">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="" style="font-size:20px;">
      <?php if ($user['IDPROFIL'] == 1) : ?>
        <?= "Administrateur" ?>
      <?php elseif ($user['IDPROFIL'] == 2) : ?>
        <?= "Approviseur" ?>
      <?php elseif ($user['IDPROFIL'] == 3) : ?>
        <?= "Vendeur" ?>
      <?php else : ?>
        <?= "Application" ?>
      <?php endif ?>
    </a>
    <div class="collapse navbar-collapse">
      <?php if ($user['IDPROFIL'] == 1) : ?>
        <ul class="navbar-nav mr-auto" id="admin-nav">
        </ul>
      <?php elseif ($user['IDPROFIL'] == 2) : ?>
        <ul class="navbar-nav mr-auto" id="aproviser-nav">
        </ul>
      <?php elseif ($user['IDPROFIL'] == 3) : ?>
        <ul class="navbar-nav mr-auto" id="vender-nav">
          <li class="nav-items"><a href="../pages/listes_cli.php" class="nav-link text-white btn">G. Clients</a></li>
          <li class="nav-items"><a href="../pages/listes_com.php" class="nav-link text-white btn">G. Commandes</a></li>
        </ul>
      <?php endif ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="../libs/logout.php" class="nav-link btn btn-danger text-white"> Deconnecte<a></li>
        <ul>
    </div>
  </nav>