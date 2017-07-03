<?php
require('DAO/abi.DAO.php');
require('metier/MClient.php');


$idclient = $_POST["client"] ;

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

abiDAO::modifClient($client);
echo 1;
}
else {
echo 0;
}
//?>
