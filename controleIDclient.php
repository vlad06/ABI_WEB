<?php
require('DAO/abi.DAO.php');
require('metier/MClient.php');

 
$idclient = $_POST["client"] ;
$clientExiste=abiDAO::getIdClient($idclient,"utilweb","utilweb");
if(!$clientExiste){
  if(isset($_POST["client"])){
    $idclient = $_POST["client"] ;
  } else {
    $idclient = 0;
  }
  if(isset($_POST["nomrais"])){
    $raisonsoc = $_POST["nomrais"] ;
    if (empty($_POST["nomrais"]))
    {
        $raisonsoc = "?";
        //  var_dump (  $raisonsoc);
    }

  } else {

    $raisonsoc = "?";

  }
  if(isset($_POST["adresse"])){
    $adresse = $_POST["adresse"] ;
    if (empty($_POST["adresse"]))
    {
        $adresse = "?";

    }
  } else {
    $adresse = "?";
  }
  if(isset($_POST["ville"])){
    $ville = $_POST["ville"] ;
    if (empty($_POST["ville"]))
    {
        $ville = "?";

    }
  } else {
    $ville = "?";
  }
  if(isset($_POST["codpostal"])){
    $codpos = $_POST["codpostal"] ;
    if (empty($_POST["codpostal"]))
    {
        $codpos = "?";

    }
  } else {
    $codpos = "?";
  }
  if(isset($_POST["tel"])){
    $tel = $_POST["tel"] ;
    if (empty($_POST["tel"]))
    {
        $tel = "?";

    }
  } else {
    $tel = "?";
  }
  if(isset($_POST["domaine"])){
    $domain = $_POST["domaine"] ;
    if (empty($_POST["domaine"]))
    {
        $domain = "?";

    }
  } else {
    $domain = "?";
  }
  if(isset($_POST["type"])){
    $type = $_POST["type"] ;
    if (empty($_POST["type"]))
    {
        $type = "?";

    }
  } else {
    $type = "?";
  }
  if(isset($_POST["nature"])){
    $nature = $_POST["nature"] ;
    if (empty($_POST["nature"]))
    {
        $nature = "?";

    }
  } else {
    $nature = "?";
  }
  if(isset($_POST["effectif"])){
    $effectif = $_POST["effectif"] ;
    if (empty($_POST["effectif"]))
    {
        $effectif = 0;

    }
  } else {
    $effectif = 0;
  }
  if(isset($_POST["chaff"])){
    $chaff = $_POST["chaff"] ;
    if (empty($_POST["chaff"]))
    {
        $chaff = 0;

    }
  } else {
    $chaff = 0;
  }
  if(isset($_POST["comment"])){
    $comment = $_POST["comment"] ;
    if (empty($_POST["comment"]))
    {
        $comment = "?";

    }
  } else {
    $comment = "?";
  }

  // setcookie("idclient", $idclient);
  // setcookie("raisonsoc", $raisonsoc);
  // setcookie("adresse", $adresse);
  // setcookie("ville", $ville);
  // setcookie("tel", $tel);
  // setcookie("codpos", $codpos);
  //setcookie("idclient", client);

     //var_dump(client);
    //  var_dump($_POST);
  //définir la connection à la table Client de la BDD Commerce
  // $host = "172.16.0.30";
  // $user="utilweb";
  // $password = "utilweb";
  // $bdd = "abi_as400";
  // $link = mysqli_connect($host, $user, $password, $bdd) or die ("erreur de connexion au serveur");
  // mysqli_set_charset($link,'utf8');

  // $query = "select * from client where ID_CLIENT='" . $idclient ."';" ;
   //echo $query;

     // pour tests
  // $result = mysqli_query($link, $query) or die ("erreur sur requete client ");
  // examen du ResultSet

     //$row ;
  $client = new MClient();
  $client->setID_CLIENT($idclient);
  $client->setRAISON_SOCIALE($raisonsoc);
  $client->setNOM_RUE($adresse);
  $client->setVILLE($ville);
  $client->setTELEPHONE($tel);
  $client->setCODE_POSTAL($codpos);
  $client->setTYPE_SOCIETE($type);
  $client->setCA($chaff);
  $client->setACTIVITE($domain);
  $client->setNATURE($nature);
  $client->setEFFECTIF($effectif);
  $client->setCOMMENT_COM($comment);

  abiDAO::InsertNewClient($client);
  echo 1;
}
else {
  echo 0;
}
//?>
