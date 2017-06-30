function controleIdentAjax(login, motpasse) {
  console.log('dans controleAJax');
  // Cette fonction sera appelée lors du click sur le bouton submit Valider
  // elle sert а contrôler que l'identification est correcte ;
  // elle retourne toujours false pour neutraliser l'action du bouton submit ;
  // le passage à la page suivante est effectué par ce script JS en retour de la transaction Ajax
  // controles coté client : zones obligatoires
  if (login.value.length === 0) {
    alert("Veuillez saisir un nom de login correct !");
    login.focus();
  } else {
    if (motpasse.value.length === 0) {
      alert("Veuillez saisir un mot de passe correct !");
      motpasse.focus();
    } else // c'est tout bon ==> controle côté serveur
    {
      // on crée l'objet XMLHttpRequest
      var xhr;
      try {
        xhr = new XMLHttpRequest(); // tout navigateur moderne
      } catch (e) {
        xhr = null; // Ajax non supporté...
        return false;
      }
      //on utilise la méthode GET pour passer les paramètres.
      // mais rien n'est visible à l'utilisateur car c'est le XHR qui effectue cette transaction, pas le browser
      xhr.open("GET", "controleIdent.php?login=" + login.value + "&motpasse=" + motpasse.value, true);
      xhr.send(null);
      //on définit l'appel de la fonction au retour serveur. Lorsque le serveur a terminé son traitement,
      // c'est cette fonction qui sera exécutée. Elle va renvoyer un message d'erreur
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          result = xhr.responseText;
          console.log(result);
          if (result == 'OK') //identification réussie côté serveur...
          { // suite : script php controle var sessions puis page sécurisée suivante
            window.location.replace("ABIAfficheClients.php");
            //document.getElementById('erreuremail').innerHTML = result;
            // avec un bouton submit, le JS controle l'enchainement des pages
          } else // pas OK côté serveur ==> afficher erreur
          {
            document.getElementById('lblErreur').innerHTML = result;
          }
        }
      }; // fin définition function Ajax
    }
  } // fin étude des cas
  return false; // dans tous les cas, pour neutraliser le submit du form
}
function controleIdentClient(idclient) {
  console.log('dans controleAJax client');
  // Cette fonction sera appelée lors du click sur le bouton submit Valider
  // elle sert а contrôler que l'ID client n'existe pas ;
  // elle retourne toujours false pour neutraliser l'action du bouton submit ;
  // le passage à la page suivante est effectué par ce script JS en retour de la transaction Ajax
  // controles coté client : zones obligatoires
  if (idclient.value.length === 0) {
    //alert("Veuillez saisir un nom de login correct !");
    idclient.focus();
  }
  else
  {


      // on crée l'objet XMLHttpRequest
      var xhr;
      try {
        xhr = new XMLHttpRequest(); // tout navigateur moderne
      } catch (e) {
        xhr = null; // Ajax non supporté...
        return false;
      }
      //on utilise la méthode GET pour passer les paramètres.
      // mais rien n'est visible à l'utilisateur car c'est le XHR qui effectue cette transaction, pas le browser
      xhr.open("GET", "controleIDclient.php?idclient=" + idclient.value , true);
      xhr.send(null);
      //on définit l'appel de la fonction au retour serveur. Lorsque le serveur a terminé son traitement,
      // c'est cette fonction qui sera exécutée. Elle va renvoyer un message d'erreur
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          result = xhr.responseText;
          console.log(result);
          if (result == 'OK') //identification réussie côté serveur...
          { // suite : script php controle var sessions puis page sécurisée suivante
              return true;
          //  window.location.replace("ABIAfficheClients.php");
            //document.getElementById('erreuremail').innerHTML = result;
            // avec un bouton submit, le JS controle l'enchainement des pages
          } else // pas OK côté serveur ==> afficher erreur
           return false;
          {

          //console.log("l'id existe");
          }
        }
      }; // fin définition function Ajax

  } // fin étude des cas
  //return false; // dans tous les cas, pour neutraliser le submit du form
}
