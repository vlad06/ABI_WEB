//verif zonne ID client
// <?php //************** code PHP objet en couches**************
//
// // chargement des fonctions d'affichages
// require('ABICreatC');
// require('ABIMenu.vue.php');
//
//
//  ?>


function verifIDclie(champ)
{
  if(champ.value.length == 0)
  {
    var element = document.getElementById("clie1");
    element.style.color="red";

      return false;
  }

  if(champ.value.trim() == "")
  {
    var element = document.getElementById("clie1");
    element.style.color="red";
      //alert("Veuillez remplir correctement la raison sociale");
          return false;
  }
  var element = document.getElementById("clie1");

  element.style.color="black";
  var element2 = document.getElementById("cliexiste");



  //var exit = controleIdentClient(champ);

  return true;
}

//verif zonne Raison sociale
function verifRaison(champ)
{
  if(champ.value.length == 0)
  {
    var element = document.getElementById("raiso1");
    element.style.color="red";
    //   var element2 = document.getElementById("raiso1") ;

        // element2.style.color ="red";
      //alert("Veuillez remplir correctement la raison sociale");
      return false;
  }

  if(champ.value.trim() == "")
  {
    var element = document.getElementById("raiso1");
    element.style.color="red";
    //  alert("Veuillez remplir correctement la raison sociale");
          return false;
  }
  var element = document.getElementById("raiso1");
  element.style.color="black";
    return true;
}

//verif zone adresse
function verifAdresse(champ)
{
  if(champ.value.length == 0)
  {
    var element = document.getElementById("adr1");
    element.style.color="red";

      return false;
  }

  if(champ.value.trim() == "")
  {
    var element = document.getElementById("adr1");
    element.style.color="red";
          return false;
  }
  var element = document.getElementById("adr1");
  element.style.color="black";
    return true;
}


//verif zone ville
function verifVille(champ)
{
  if(champ.value.length == 0)
  {
    var element = document.getElementById("vill1");
    element.style.color="red";

      return false;
  }

  if(champ.value.trim() == "")
  {
    var element = document.getElementById("vill1");
    element.style.color="red";

          return false;
  }
  var element = document.getElementById("vill1");
  element.style.color="black";
    return true;
}

//verif zone code postal
function verifCp(champ)
{
  if(  champ.value.length != 5)
  {
    var element = document.getElementById("cp1");
    element.style.color="red";

      return false;
  }

  if(champ.value.trim() == "")
  {
    var element = document.getElementById("cp1");
    element.style.color="red";
          return false;
  }

      // si non numerique
   if (isNaN(champ.value.trim()) == true)
  {
    var element = document.getElementById("cp1");
    element.style.color="red";
          return false;
  }
  var element = document.getElementById("cp1");
  element.style.color="black";
    return true;
}

function verifTel(champ)
{
  if(champ.value.length == 0)
  {
    var element = document.getElementById("tel1");
    element.style.color="red";

      return false;
  }

  if(champ.value.trim() == "")
  {
    var element = document.getElementById("tel1");
    element.style.color="red";
          return false;
  }
  var element = document.getElementById("tel1");
  element.style.color="black";
    return true;
}

function verifAct(champ)
{
  if(champ.value.length == 0)
  {
    var element = document.getElementById("act1");
    element.style.color="red";

      return false;
  }

  if(champ.value.trim() == "")
  {
    var element = document.getElementById("act1");
    element.style.color="red";
          return false;
  }
  var element = document.getElementById("act1");
  element.style.color="black";
    return true;
}

function verifTyp(champ)
{
  if(champ.value.length == 0)
  {
    var element = document.getElementById("typ1");
    element.style.color="red";

      return false;
  }

  if(champ.value.trim() == "")
  {
    var element = document.getElementById("typ1");
    element.style.color="red";
          return false;
  }
  var element = document.getElementById("typ1");
  element.style.color="black";
    return true;
}

function verifNat(champ)
{
  if(champ.value.length == 0)
  {
    var element = document.getElementById("nat1");
    element.style.color="red";

      return false;
  }

  if(champ.value.trim() == "")
  {
    var element = document.getElementById("nat1");
    element.style.color="red";
          return false;
  }
  var element = document.getElementById("nat1");
  element.style.color="black";
    return true;
}

function verifEff(champ)
{
  if(champ.value.length == 0)
  {
    var element = document.getElementById("eff1");
    element.style.color="red";

      return false;
  }

  if(champ.value.trim() == "")
  {
    var element = document.getElementById("eff1");
    element.style.color="red";
          return false;
  }
  if (isNaN(champ.value.trim()) == true)
 {
   var element = document.getElementById("eff1");
   element.style.color="red";
         return false;
 }
  var element = document.getElementById("eff1");
  element.style.color="black";
    return true;
}

function verifCaf(champ)
{
  if(champ.value.length == 0)
  {
    var element = document.getElementById("ca1");
    element.style.color="red";

      return false;
  }

  if(champ.value.trim() == "")
  {
    var element = document.getElementById("ca1");
    element.style.color="red";
          return false;
  }
  if (isNaN(champ.value.trim()) == true)
 {
   var element = document.getElementById("ca1");
   element.style.color="red";
         return false;
 }
  var element = document.getElementById("ca1");
  element.style.color="black";
    return true;
}
function verifForm(f)
{
  var idclieOK = verifIDclie(f.client);
  var raisonOK = verifRaison(f.nomrais);

  var adressOK = verifAdresse(f.adresse);
  var villeOK = verifVille(f.ville);
  var cpOK = verifCp(f.codpostal);
  var telOK = verifTel(f.tel);
  var actOK = verifAct(f.domaine);
  var typOK = verifTyp(f.type);
  var natOK = verifNat(f.nature);
  var effOK = verifEff(f.effectif);
  var cafOK = verifCaf(f.chaff);
  if(raisonOK && idclieOK && adressOK && villeOK && cpOK && telOK && actOK && typOK && natOK && effOK && cafOK)
  {
    var valeur = document.getElementById('clie').value;
    //alert ('clie = ' + valeur);

    if(controleIdentClient(valeur))
{
  alert('toto')
  return true;
}
else
  {return false;}


  //  return true;

  }
  else {
    alert("Veuillez remplir correctement tous les champs");
    return false;
  }
}
