<?php
class abiDAO {

  private static function ConnectAbi($user,$password){
    $host='172.16.0.30';
    $bdd='ABI_AS400';
      try{
        $mysqlPDO=new PDO("mysql:host=$host;dbname=$bdd;charset=utf8",$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      }
      catch(Exception $e){
        die('<h1>Erreur de connexion : </h1>'.$e->getMessage());
      }
    return $mysqlPDO;
  }

  private static function DisconnectAbi($mysqlPDO){
    unset($mysqlPDO); //détruit l'objet PDO
  }

  public static function getIdClient($idclient,$user,$password) {
    $mysqlPDO=abiDAO::ConnectAbi($user,$password);
    $sql="select * from client where ID_CLIENT=" . $idclient .";";

    $recordSet=$mysqlPDO->query($sql);

    $data=array();
    foreach($recordSet as $row){
      $data[]=$row;
    }


    $recordSet->closeCursor();
    abiDAO::DisconnectAbi($mysqlPDO);
    if($data){
      return $data[0];
    } else {
      return false;
    }
  }
    public static function listeClients($user,$password){
      $mysqlPDO=abiDAO::ConnectAbi($user,$password);
      $sql='select ID_CLIENT,RAISON_SOCIALE,TYPE_SOCIETE,VILLE,CA,ACTIVITE,NATURE,TELEPHONE,EFFECTIF,NUMERO_RUE,NOM_RUE,CODE_POSTAL,COMMENT_COM from client order by ID_CLIENT';
      $recordSet=$mysqlPDO->query($sql);
      $data=array();
      foreach($recordSet as $row){
        $data[]=$row;
      }
      $recordSet->closeCursor();
      abiDAO::DisconnectAbi($mysqlPDO);
      return $data;
    }

    public static function ListeContacts($user,$password){
      $mysqlPDO=abiDAO::ConnectAbi($user,$password);
      $sql='select ID_CONTACT,NOM_CONTACT,PRENOM_CONTACT,TEL_CONTACT,FONCTION_CONTACT from contact order by ID_CONTACT,NOM_CONTACT';
      $recordSet=$mysqlPDO->query($sql);
      $data=array();
      foreach($recordSet as $row){
        $data[]=$row;
      }
      $recordSet->closeCursor();
      abiDAO::DisconnectAbi($mysqlPDO);
      return $data;
    }

// retourne la liste des films d'un type voulu
public static function ListeContactsParClient($user, $password, $idClient){
// connection BDD
$mysqlPDO = abiDAO::ConnectAbi($user, $password);
// requete SQL des films du type demande (avec realisateur)
// - projection
$sql = 'select ID_CLIENT,ID_CONTACT, NOM_CONTACT, PRENOM_CONTACT, TEL_CONTACT, MAIL_CONTACT,FONCTION_CONTACT from contact where contact.ID_CLIENT='.$idClient;
// echo $sql;
// - produit cartesien
// Un paramètre est matérialisé dans le
// libellé de la requête ; sa valeur est
// précisée dans le tableau de paramètres
// communiqué à la méthode execute().
// preparation requête
$recordSet = $mysqlPDO-> prepare($sql);
// execution requete
$recordSet->execute(array($idClient));
// lecture tous enregistrements et transformation en tableau associatif PHP
// $data=$recordSet->fetchAll();
$data=array();
foreach($recordSet as $row){
  $data[]=$row;
}
//var_dump($data) ; // pour test
// pour faire propre
$recordSet->closeCursor();
abiDAO::DisconnectAbi($mysqlPDO);
// retourne le tableau associatif de resultats
return $data;
}

// teste l'existence d'un adherent dans la table Adherent
public static function ExisteUtilisateur($user, $password, $dataResa){
 // connection BDD
 $mysqlPDO = abiDAO::ConnectAbi($user, $password);
 // requete SQL
 $sql = "select * from adherent where NUM_ADHERENT= ? and
NOM_ADHERENT= ? " ;
 //echo $sql ; // pour test

 // utilisation outils PDO(a securiser)
 // ----------------------
 // preparation requête
 $rs = $mysqlPDO->prepare($sql);
 // execution requete
 $rs->execute(array($dataResa["numadherent"], $dataResa["nom"] ));
 // lecture tous enregistrements et transformation
 // en tableau associatif PHP
 $data=$rs->fetchAll();
 //var_dump($data) ; // pour test

 // nombre de records recus
 $nombre = count($data);

 // pour faire propre
 $rs->closeCursor();
 abiDAO::DisconnectAbi($mysqlPDO);

 // retour booleen indiquant si trouve
 return ($nombre != 0);
}

// insere une ligne dans la table client
public static function InsertNewClient($client){
// connection BDD
$mysqlPDO = abiDAO::ConnectAbi("utilweb", "utilweb");

// requete insert SQL (avec concaténations manuelles - pour voir...)
$sql = 'insert into client(ID_CLIENT, RAISON_SOCIALE, TYPE_SOCIETE, VILLE, CA, ACTIVITE, NATURE, TELEPHONE, EFFECTIF, NOM_RUE, CODE_POSTAL, COMMENT_COM)
values (';
$sql .= $client->getID_CLIENT(). ', ';
$sql .= '\'' . $client->getRAISON_SOCIALE(). '\', ';
$sql .= '\'' . $client->getTYPE_SOCIETE(). '\', ';
$sql .= '\'' . $client->getVILLE(). '\', ';
$sql .= $client->getCA(). ', ';
$sql .= '\'' . $client->getACTIVITE(). '\', ';
$sql .= '\'' . $client->getNATURE(). '\', ';
$sql .= '\'' . $client->getTELEPHONE(). '\', ';
$sql .= $client->getEFFECTIF(). ', ';
// $sql .= $client->getNUMERO_RUE(). ', ';
$sql .= '\'' . $client->getNOM_RUE(). '\', ';
$sql .= '\'' . $client->getCODE_POSTAL(). '\', ';
$sql .= '\'' . $client->getCOMMENT_COM(). '\'); ';

//echo $sql; // pour test
// utilisation outils PDO
// ----------------------
// preparation requête
$rs=$mysqlPDO-> prepare($sql);
// echo '$rs';
// execution requete
$rs->execute();
// nombre de lignes inserees
// pourrait être retourné comme résultat de la fonction
// $nombre = $rs->rowCount();
// echo $nombre; // pour test


$rs->closeCursor();
abiDAO::DisconnectAbi($mysqlPDO);
}

public static function InsertNewContact($newContact, $user,$password){
// connection BDD
$mysqlPDO = abiDAO::ConnectAbi($user, $password);
// ajouter le contrôle d'inexistence
// requete insert SQL (avec concaténations manuelles - pour voir...)
$sql = 'insert into contact(ID_CONTACT, ID_CLIENT, NOM_CONTACT,
PRENOM_CONTACT, TEL_CONTACT, FONCTION_CONTACT) values (';
$sql .= $newContact->getID_CONTACT() . ', ';
$sql .= $newContact->getID_CLIENT() . ', ';
$sql .= '\'' . $newContact->getID_NOM_CONTACT() . '\', ';
$sql .= '\'' . $newContact->getPRENOM_CONTACT() . '\', ';
$sql .= '\'' . $newContact->getTEL_CONTACT() . '\', ';
$sql .= '\'' . $newContact->getMAIL_CONTACT() . '\', ';
$sql .= '\'' . $newContact->getFONCTION_CONTACT() . '\' );';
//echo $sql; // pour test
// utilisation outils PDO (a securiser)
// ----------------------
// preparation requête
$rs = $mysqlPDO->prepare($sql);
// execution requete
$rs->execute();
// nombre de lignes inserees
// pourrait être retourné comme résultat de la fonction
//$nombre = $rs->rowCount();
//echo $nombre; // pour test
// pour faire propre
$rs->closeCursor();
abiDAO::DisconnectAbi($mysqlPDO);
}
public static function modifClients($user,$password,$monclient){
  $mysqlPDO=abiDAO::ConnectAbi($user,$password);
  $sql='UPDATE client SET client.ACTIVITE = _ ';
  $recordSet=$mysqlPDO->query($sql);
  $data=array();
  foreach($recordSet as $row){
    $data[]=$row;
  }
  $recordSet->closeCursor();
  abiDAO::DisconnectAbi($mysqlPDO);
  return $data;
}
}
?>
