<?php // ********** code PHP objet en couches ***************
// classe Metier film

class MClient {
 // attributs
 private $ID_CLIENT;   //le numéro de client unique pour chaque client
 private $RAISON_SOCIALE;   //raison sociale du client
 private $TYPE_SOCIETE;  //public ou privé
 private $VILLE;
 private $CA;   //chiffre d'affaire du client
 private $ACTIVITE;  //secteur d'activité du client (pour l'instant agro, industrie, ...)
 private $NATURE;    // principale, secondaire ou ancienne
 private $TELEPHONE; //téléphone du client
 private $EFFECTIF; //nombre de salariés du client
 private $NUMERO_RUE;
 private $NOM_RUE;
 private $CODE_POSTAL;
 private $COMMENT_COM;

 // constructeur
 public function __construct(){}

 // getters
 public function getID_CLIENT(){
   return $this->ID_CLIENT;
 }
 public function getRAISON_SOCIALE(){
   return $this->RAISON_SOCIALE;
 }
 public function getTYPE_SOCIETE(){
   return $this->TYPE_SOCIETE;
 }
 public function getACTIVITE(){
   return $this->ACTIVITE;
 }
 public function getNUMERO_RUE(){
   return $this->NUMERO_RUE;
 }
 public function getNOM_RUE(){
   return $this->NOM_RUE;
 }
 public function getCODE_POSTAL(){
   return $this->CODE_POSTAL;
 }
 public function getVILLE(){
   return $this->VILLE;
 }
 public function getNATURE(){
   return $this->NATURE;
 }
 public function getTELEPHONE(){
   return $this->TELEPHONE;
 }
 public function getCA(){
   return $this->CA;
 }
 public function getEFFECTIF(){
   return $this->EFFECTIF;
 }
 public function getCOMMENT_COM(){
   return $this->COMMENT_COM;
 }

 // setters
 public function setID_CLIENT($value){
   $this->ID_CLIENT = $value;
 }
 public function setCA($value){
   $this->CA = $value;
 }
 public function setRAISON_SOCIALE($value){
   $this->RAISON_SOCIALE = strtoupper(trim($value));//en majuscule
 }
 public function setTYPE_SOCIETE($value){
   $this->TYPE_SOCIETE=$value;
 }
 public function setACTIVITE($value){
   $this->ACTIVITE = $value;
 }
 public function setNUMERO_RUE($value){
   $this->NUMERO_RUE = $value;
 }
 public function setNOM_RUE($value){
   $this->NOM_RUE = $value;
 }
 public function setCODE_POSTAL($value){
   $this->CODE_POSTAL = $value;
 }
 public function setVILLE($value){
   $this->VILLE = $value;
 }
 public function setNATURE($value){
   $this->NATURE=$value;
 }
 public function setTELEPHONE($value){
   $this->TELEPHONE=$value;
 }
 public function setCOMMENT_COM($value){
   $this->COMMENT_COM=$value;
 }
 public function setEFFECTIF($value){
   $this->EFFECTIF=$value;
 }
// = ucfirst(trim($value)); // capitale forcee au debut du resume
 // methode de restitution en clair
 public function __toString(){
   return "Client : " . $this->ID_CLIENT . " - " . $this->RAISON_SOCIALE ." (" . $this->NATURE . ")";
 }
}
?>
