<?php

if(isset($_POST['login'])) {
  $login = $_POST['login'] ;
}
if(isset($_POST['motpasse'])) {
  $motpasse = $_POST['motpasse'] ;
}
$host = "localhost";
$user="utilweb";
$password = "utilweb";
$bdd = "abi_as400";

$link = mysqli_connect($host, $user, $password, $bdd) or die ("erreur de connexion au serveur");
mysqli_set_charset($link,'utf8');
$query = "select * from utilisateurs where login='" . $login ."';" ;

 $result = mysqli_query($link, $query) or die ("erreur sur requete table utilisateurs ");

$array=mysqli_fetch_array($result);

if($array[2]==$motpasse && $motpasse != ""){
  session_start();
	$_SESSION['fonction'] = $array[0];
	$_SESSION['login']=$array[1];
	echo "1";
} else {
  $_SESSION = array();
	echo "0";
}
mysqli_free_result($result);
mysqli_close($link);
 ?>
