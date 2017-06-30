<?php
 $IDclie = $_GET["idclient"] ;

  //var_dump (idclient);
//echo "idclient = ";

//définir la connection à la table Client de la BDD Commerce
 $host = "172.16.0.30";
 $user="utilweb";
 $password = "utilweb";
$bdd = "abi_as400";
$link = mysqli_connect($host, $user, $password, $bdd) or die ("erreur de connexion au serveur");
mysqli_set_charset($link,'utf8');
//execution d'une requete select sur la table user
 $query = "select * from client where ID_CLIENT='" . $IDclie ."';" ;
 //echo $query;

   // pour tests
 $result = mysqli_query($link, $query) or die ("erreur sur requete client ");
// examen du ResultSet

   //$row ;

if ($row = mysqli_fetch_array($result))
{
    //echo "$row  = ";
      echo "KO";



}// si lecture renvoie (au moins) une ligne
// echo "OK"; //client existant, pas d'erreur
else
{
  echo "OK";
 //echo "Vous n'etes pas inscrit !!"; // si lecture n'a pas renvoyé de ligne
}
//fermeture de la connection
mysqli_free_result($result);
mysqli_close($link);
//?>
