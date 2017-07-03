<?php
$idClient = $_GET["idClient"] ;

$host = "172.16.0.30";
$user="utilweb";
$password = "utilweb";
$bdd = "abi_as400";
$link = mysqli_connect($host, $user, $password, $bdd) or die ("erreur de connexion au serveur");
mysqli_set_charset($link,'utf8');
//execution d'une requete select sur la table user
$query = 'DELETE FROM CONATCT WHERE contact.ID_CLIENT='.$idClient.'\';';
mysql_select_db($bdd);
// mysql_query fais une consultation sur la bdd
$result = mysqli_query($query,$link) or die ("erreur sur requete table client ");
printf("La supression s'est bien fait");
// echo $result;
// // si on RECUPERE UNE LIGNE
// if (mysqli_fetch_array($result))
// {
//  $array=mysqli_fetch_array($result);
//  echo json_encode($array);
// } else {
//   echo '0';
// }
// //ermeture de la connection
// mysqli_free_result($result);
// mysqli_close($link);
 ?>

 <?php

   mysql_select_db('abi_as400');
   $retval = mysql_query( $sql, $conn );

   if(! $retval ) {
      die('Could not delete data: ' . mysql_error());
   }
   echo "Deleted data successfully\n";
   mysql_close($conn);
?>
