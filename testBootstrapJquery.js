$(document).ready(function() {
  //**********************************************************
  //***************DATATABLE FUNCTIONS******************
  //*************************************************

  //   var table = $('#clientTable').dataTable( {
  //   "dom": 'ftlrip'
  // } );

  // var table = $('#clientTable').dataTable( {
  //   "dom": '<"wrapper"flipt>'
  // } );
//show the database with load of options thanks to the datatable
//the datatable is stocked within the var table for later use
  var table = $('#clientTable').DataTable({
    buttons: [
      'excel','pdf']
    // ],
		// "dom": 'rt<"bottom"iflp><"clear">'
	});
//the class selected permit the highlightning of the current datatable row
  $('#clientTable tbody').on('click', 'tr', function() {
    if ($(this).hasClass('selected')) {
      $(this).removeClass('selected');
    } else {
      table.$('tr.selected').removeClass('selected');
      $(this).addClass('selected');
    }
  });

  //*********************************************************
  //******************AJAX FUNCTIONS**************************
  //**********************************************************

  //test in db if login and pass exist and match together
  $('#formConnexion').on('submit',function (e){
    //let's prevent the nav from doing what it wants
    e.preventDefault();
    //let's show a little loading logo
    $('#msgLogin').html('<img src="/img/source.gif" alt="" style="width:50px;height:50px"/>');
    //recuperate the data in the textfields
    login = $("#login").val();
    password = $("#motpasse").val();
    $.ajax({
      //login and pass will be tested in this php file
      url:'myIdControlAjax.php',
      method:'POST',
      data:{login:login,motpasse:password}
    })
      .done(function(data){
        //if (login/pass) exist and match
        if(data == "1"){
          location.replace("ABIAfficheClients.php");
          //otherwise
        } else {
          $("#msgLogin").html('Erreur de connexion !');
          $("#motpasse").val('');
        }
      });
  });


    $('#val').on('submit',function (e){
      //let's prevent the nav from doing what it wants
      e.preventDefault();
      //let's show a little loading logo
      var client = $(this).serialize();
      //recuperate the data in the textfields
      $.ajax({
        //login and pass will be tested in this php file
        url:'controleIDclient.php',
        method:'POST',
        data:client
      })
        .done(function(result){
          //if (login/pass) exist and match
          if(result == "1"){
            // alert('client crée');
            window.location.href = "ABIAfficheClients.php";
            //otherwise
          } else {
           //$("#cliexiste").html('Erreur de connexion !' + result);
            document.getElementById('cliexiste').style.display = "block";

          }
        });
    });

    $('#modifClient').on('submit',function (e){
      //let's prevent the nav from doing what it wants
      e.preventDefault();
      //let's show a little loading logo
      var client = $(this).serialize();
      //recuperate the data in the textfields
      $.ajax({
        //login and pass will be tested in this php file
        url:'modifClient.php',
        method:'POST',
        data:client
      })
        .done(function(result){
          //if (login/pass) exist and match
          if(result == "1"){
            alert('client modifié');
            // window.location.href = "ABIAfficheClients.php";

          } else {
           $("#cliexiste").html('Erreur de connexion !' + result);
            document.getElementById('cliexiste').style.display = "block";

          }
        });
    });

  function getClientAjax(ID) {
    $.ajax({
        method: "GET",
        url: "fillClientAjax.php",
        data: {	idClient: ID }
      })
      .done(function(msg) {
        client = jQuery.parseJSON(msg);
        $("#idClient").val(client.idClient);
        $("#raisonSociale").val(client.raisonSociale);
        $("#numeroRue").val(client.numeroRue);
        $("#nomRue").val(client.nomRue);
        $("#ville").val(client.ville);
        $("#telephone").val(client.telephone);
        $("#codePostal").val(client.codePostal);
        $("#activite").val(client.activite);
        $("#typeSociete").val(client.typeSociete);
        $("#effectif").val(client.effectif);
        $("#commentCom").val(client.commentCom);
        $("#nature").val(client.nature);
        $("#ca").val(client.ca);
        $("#numIdClient").html(client.idClient);
      });
  }

// fucntion creee par bibiana test
  function getClientAjaxPourModifier(ID) {
    $.ajax({
        method: "GET",
        url: "fillClientAjax.php",
        data: {	idClient: ID }
      })
      .done(function(msg) {
        client = jQuery.parseJSON(msg);
        $("#idClientModif").val(client.idClient);
        $("#raisonSocialeModif").val(client.raisonSociale);
        $("#numeroRueModif").val(client.numeroRue);
        $("#nomRueModif").val(client.nomRue);
        $("#villeModif").val(client.ville);
        $("#telephoneModif").val(client.telephone);
        $("#codePostalModif").val(client.codePostal);
        $("#activiteModif").val(client.activite);
        $("#typeSocieteModif").val(client.typeSociete);
        $("#effectifModif").val(client.effectif);
        $("#commentComModif").val(client.commentCom);
        $("#natureModif").val(client.nature);
        $("#caModif").val(client.ca);
        $("#numIdClientModif").html(client.idClient);
      });
  }

  function getContactList(ID){
    $.ajax({
      method:"GET",
      url: "testAfficheContact.php",
      data: { idClient: ID}
    })
    .done(function(result) {
      alert(result);
      // listeContact=jQuery.parseJson(result);
      // $('#contactTable'.DataTable({
      //   "ajax": listeContact;
      // }));
    })
  }

  function getId() {
		if (table.row('.selected').index() >= 0) {
			idClient = $('tr.selected').attr('id');
		}
		return idClient;
	}
  //********************************************************************
  //**********BUTTON EVENTS*****************
  //********************************************

  	$('#btnLogOut').click(function() {
  		// alert('shit');
  		window.location = "ABIAccueil.php";
  	});


	$('#btnDetail').on('click', function() {
		if (table.row('.selected').index() >= 0) {
			getClientAjax(getId());
			$('#clientModalDetail').modal();
		} else {
      alert('merci de sélectionner un client');
    }
	});

  $('#btnModifier').on('click', function() {
		if (table.row('.selected').index() >= 0) {
      getClientAjaxPourModifier(getId());

			$('#clientModalModif').modal();
		} else {
      alert('merci de sélectionner un client');
    }
	});

  $('#btnContact').on('click',function(){
    if(table.row('.selected').index() >=0){
      getContactList(getId());
      // $('#contactTable').DataTable();
      $('#contactModalDetail').modal();
    } else {
      alert('merci de sélectionner un client');
    }
  });










});
