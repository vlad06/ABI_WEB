<?php
 $login = $_GET["login"] ;
 $motpasse = $_GET["motpasse"] ;
  //var_dump ($loggin);

//définir la connection à la table Client de la BDD Commerce
 $host = "localhost";
 $user="utilweb";
 $password = "utilweb";
$bdd = "abi_as400";
$link = mysqli_connect($host, $user, $password, $bdd) or die ("erreur de connexion au serveur");
mysqli_set_charset($link,'utf8');
//execution d'une requete select sur la table user
 $query = "select motpasse from utilisateurs where login='" . $login ."';" ;
 //echo $query;

   // pour tests
 $result = mysqli_query($link, $query) or die ("erreur sur requete utilisateurs ");
// examen du ResultSet

   //$row ;

if ($row = mysqli_fetch_array($result))
{
  if ($row[0] != $motpasse)
  {
      echo "mot de passe incorrect";
  }
  else
  {
      echo "OK";
  }
}// si lecture renvoie (au moins) une ligne
// echo "OK"; //client existant, pas d'erreur
else
{

 echo "Vous n'etes pas inscrit !!"; // si lecture n'a pas renvoyé de ligne
}
//fermeture de la connection
mysqli_free_result($result);
mysqli_close($link);
//?>
