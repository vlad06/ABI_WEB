<?php
class MContact
    {
        //ATTRIBUTS
        private $ID_CONTACT;
        private $NOM_CONTACT;
        private $PRENOM_CONTACT;
        private $TEL_CONTACT;
        private $MAIL_CONTACT;
        private $FONCTION_CONTACT;

        //CONSTRUCTEUR
        public function __construct(){}

        // getters
        public function getID_CONTACT(){
          return $this->ID_CONTACT;
        }
        public function getNOM_CONTACT(){
          return $this->NOM_CONTACT;
        }
        public function getPRENOM_CONTACT(){
          return $this->PRENOM_CONTACT;
        }
        public function getTEL_CONTACT(){
          return $this->TEL_CONTACT;
        }
        public function getMAIL_CONTACT(){
          return $this->MAIL_CONTACT;
        }
        public function getFONCTION_CONTACT(){
          return $this->FONCTION_CONTACT;
        }

          // setters
        public function setID_CONTACT($value){
          $this->ID_CONTACT = $value;
        }
        public function setNOM_CONTACT($value){
          $this->NOM_CONTACT = strtoupper(trim($value));//en majuscule
        }
        public function setPRENOM_CONTACT($value){
          $this->PRENOM_CONTACT=$value;
        }
        public function setTEL_CONTACT($value){
          $this->TEL_CONTACT = $value;
        }
        public function setFONCTION_CONTACT($value){
          $this->FONCTION_CONTACT = $value;
        }
        public function setNATURE($value){
          $this->NATURE=$value;
        }
        public function setTELEPHONE($value){
          $this->TELEPHONE=$value;
        }
        public function setMAIL_CONTACT($value){
          $this->MAIL_CONTACT=$value;
        }

          // methode de restitution en clair UTILE ????????
        public function __toString(){
         return "Client : " . $this->ID_CLIENT . " - " . $this->RAISON_SOCIALE .
         " (" . $this->NATURE . ")";
        }
    }
     ?>
