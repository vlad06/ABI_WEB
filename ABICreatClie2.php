<?php
require('metier/MClient.php');
require('DAO/abi.DAO.php');

$newClient = new MClient();

$newClient->setID_CLIENT($_POST["client"]);
$newClient->setRAISON_SOCIALE($_POST["nomrais"]);
$newClient->setTYPE_SOCIETE($_POST["type"]);
$newClient->setVILLE($_POST["ville"]);
$newClient->setCA($_POST["chaff"]);
$newClient->setACTIVITE($_POST["domaine"]);
$newClient->setNATURE($_POST["nature"]);
$newClient->setTELEPHONE($_POST["tel"]);
$newClient->setEFFECTIF($_POST["effectif"]);
$newClient->setNUMERO_RUE($_POST["client"]);
$newClient->setNOM_RUE($_POST["adresse"]);
$newClient->setCODE_POSTAL($_POST["codpostal"]);
$newClient->setCOMMENT_COM($_POST["comment"]);
$user = "utilweb";
$password = "utilweb";
abiDAO::InsertNewClient($newClient, $user, $password);

// header("location:VCIAdmin.php?error= film" . $newFilm->getTitreFilm(). " a bien étè crée");
exit();
 ?>
