<?php

if(isset($_POST['login'])) $login = $_POST['login'] ;
if(isset($_POST['password'])) $pass = $_POST['password'] ;
// echo $login;
// echo '<br />';
// echo $pass;
// echo '<br />';
$host = "localhost";
$user="utilweb";
$password = "utilweb";
$bdd = "abi_as400";
// echo $login."/".$pass;
$link = mysqli_connect($host, $user, $password, $bdd) or die ("erreur de connexion au serveur");
mysqli_set_charset($link,'utf8');
$query = "select * from utilisateurs where login='" . $login ."';" ;
// echo $query;
// echo '<br />';
 $result = mysqli_query($link, $query) or die ("erreur sur requete table utilisateurs ");
// echo ($result);
// try{
// 	$linkPDO=new PDO("mysql:host=$host;dbname=$bdd;charset=utf8",$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// }
// catch(Exception $e){
// 	die('<h1>Erreur de connexion : </h1>'.$e->getMessage());
// }
// $sqlQuery = "select * from utilisateurs where login='" . $login ."';" ;
// //echo $sqlQuery;
// $recordSet=$linkPDO->query($query);
// var_dump($recordSet);
// $data=array();
// foreach($recordSet as $row){
// 	$data[]=$row;
// }
// var_dump($result);
// var_dump(mysqli_fetch_array($result));
$array=mysqli_fetch_array($result);
// if($row[1] == $pass){
// var_dump($row);
// var_dump($fuckinArray[0]);
// echo '<br />';
// var_dump($fuckinArray[2]);
// echo '<br />';
// echo $fuckinArray[2];
//
// echo '<br />';
// var_dump($fuckinArray);
// echo '<br />';
if($array[2]==$pass){
	session_start();
	$_SESSION['fonction'] = $array[0];
	$_SESSION['login']=$array[1];
	// echo '{"grant":"1"}';
	// echo "on retourne bien 1";
	echo "1";
} else {
	// echo '{"grant":"0"}';
	// echo "on retourne bien 0";
	echo "0";
}
mysqli_free_result($result);
mysqli_close($link);
 ?>
