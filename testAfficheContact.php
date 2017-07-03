<?php
require "DAO/abi.DAO.php";
$idClient=$_GET["idClient"];
$listeContact=abiDAO::ListeContactsParClient("utilweb","utilweb",$idClient);
var_dump($listeContact);
 ?>
