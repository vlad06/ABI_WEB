$(document).ready(function() {

  $('#formConnexion').on('submit',function (e){
    e.preventDefault();
    $('#msgLogin').html('<img src="/img/plus.ico" alt="" />');
    login = $("#login").val();
    password = $("#password").val();
    $.ajax({
      url:'myIdControlAjax.php',
      type:'POST',
      data:{login:login,password:password}
    })
      .done(function(data){
        // data=JQuery.parseJSON(data);
        if(data == "1"){
          location.replace("ABIAfficheClients.php");
          $("#msgLogin").html('Alright !');
          // location.replace("myIdControlAjax.php");
        } else {
          $("#msgLogin").html('Erreur de connexion !'+msg);
          $("#password").val('');
          // location.replace("myIdControlAjax.php");
        }
      });
  });

  function getClientAjax(ID) {
    $.ajax({
        method: "GET",
        url: "fillClientAjax.php",
        data: {	idClient: ID	}
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
  // function checkLogin(){
  //   $('#msgLogin').html('<img src="/img/plus.ico" alt="" />');
  //   login = $("#login").val();
  //   password = $("#password").val();
  //   alert("login : "+login+" \ pass : "+password);
  //   console.log("login : "+login+" \ pass : "+password);
  //   $.ajax({
  //     url:'myIdControlAjax.php',
  //     type:'post',
  //     cache:false,
  //     data:{login:login,password:password},
  //     success:function(data){
  //       if(data.grant == "1"){
  //         window.location.replace("ABIAfficheClients.php");
  //       } else {
  //         $("msgLogin").html('Erreur de connexion !');
  //         $("#password").val('');
  //       }
  //     }
  //   });
  // }
	// $.extend( true, $.fn.dataTable.defaults, {
	//     "searching": false,
	//     "ordering": false
	// } );

	var table = $('#clientTable').DataTable({
		"searching": true,
		"dom": 'rt<"bottom"iflp><"clear">'
	});

	//   var table = $('#clientTable').dataTable( {
	//   "dom": 'ftlrip'
	// } );

	// var table = $('#clientTable').dataTable( {
	//   "dom": '<"wrapper"flipt>'
	// } );

	$('#clientTable tbody').on('click', 'tr', function() {
		if ($(this).hasClass('selected')) {
			$(this).removeClass('selected');
		} else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});

	// $('#btnTest').on('click', function() {
	// 	var idClient;
	// 	var rowIndex = table.row('.selected').index();
	// 	if (rowIndex >= 0) {
	// 		idClient = $('tr.selected').attr('id');
	// 		alert(idClient);
	// 		header.location();
	// 	} else {
	// 		alert('pas de selection');
	// 	}
	// });

	$('#btnDetail').on('click', function() {
		if (table.row('.selected').index() >= 0) {
			// $('#idClient').val(getId());
			// $('#showFormClient').prop('readonly');
			getClientAjax(getId());
			$('#clientModalDetail').modal();
		} else alert('merci de sélectionner un client');
	});

	function getId() {
		if (table.row('.selected').index() >= 0) {
			idClient = $('tr.selected').attr('id');
		}
		return idClient;
	}

	$('#btnDelete').click(function() {
    if(table.row('.selected').index() >= 0){
      deleteClientAjax(getId());
      table.row('.selected').remove().draw(false);
    } else {
      alert('merci de sélectionner un client');
    }

	});



	function getContactAjax(ID) {
		$.ajax({
				method: "GET",
				url: "fillContactAjax.php",
				data: {
					idClient: ID
				}
			})
			.done(function(msg) {
				client = jQuery.parseJSON(msg);
				$("#idClient").val(client.idClient);
				$("#idContact").val(client.idContact);
				$("#nomContact").val(client.nomContact);
				$("#prenomContact").val(client.prenomContact);
				$("#telContact").val(client.telContact);
				$("#mailContact").val(client.mailContact);
				$("#fonctionContact").val(client.fonctionContact);
			});
	}

	$('#btnLogOut').click(function() {
		// alert('shit');
		window.location = "ABIAccueil.php";
	});

});
