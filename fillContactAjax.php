<?php
 $idClient = $_GET["idClient"] ;

 $host = "172.16.0.30";
 $user="utilweb";
 $password = "utilweb";
$bdd = "abi_as400";
$link = mysqli_connect($host, $user, $password, $bdd) or die ("erreur de connexion au serveur");
mysqli_set_charset($link,'utf8');
//execution d'une requete select sur la table user
$query = 'select ID_CONTACT, NOM_CONTACT, PRENOM_CONTACT, TEL_CONTACT, FONCTION_CONTACT from contact where contact.ID_CLIENT='.$idClient.'\';';
 $result = mysqli_query($link, $query) or die ("erreur sur requete table client ");

if ($row = mysqli_fetch_array($result))
{
  $array=array(
    'idClient' => $row['ID_CLIENT'],
    'idContact' => $row['ID_CONTACT'],
    'raisonSociale' => $row['RAISON_SOCIALE'],
    'nature' => $row['NATURE'],
    'typeSociete' => $row['TYPE_SOCIETE'],
    'telephone' => $row['TELEPHONE'],
    'numeroRue' => $row['NUMERO_RUE'],
    'nomRue' => $row['NOM_RUE'],
    'codePostal' => $row['CODE_POSTAL'],
    'ville' => $row['VILLE'],
    'ca' => $row['CA'],
    'effectif' => $row['EFFECTIF'],
    'commentCom' => $row['COMMENT_COM']
  );
  echo json_encode($array);
}//client existant, pas d'erreur
//ermeture de la connection
mysqli_free_result($result);
mysqli_close($link);
//?>
