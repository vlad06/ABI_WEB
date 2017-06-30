

$(document).ready(function() {

  // $.extend( true, $.fn.dataTable.defaults, {
  //     "searching": false,
  //     "ordering": false
  // } );

  var table = $('#clientTable').DataTable({
    "searching":true,
    "dom":'rt<"bottom"iflp><"clear">'
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

//   $('#controle').on('click', function() {
// var valeur = document.getElementById('clie').value;
// //alert ('clie = ' + valeur);
// var retour = controleIdentClient(valeur);
// //var retour = controleIdentClient(document.getElementById('clie'));
//
//       //alert('retour = ' + retour);
//
//
//   });


  $('#btnTest').on('click', function() {
    var idClient;
    var rowIndex=table.row('.selected').index();
    if(rowIndex>=0){
      idClient=$('tr.selected').attr('id');
      alert(idClient);
      header.location()
    }
    else{
      alert('pas de selection');
    }
  });

  $('#btnDetail').on('click', function(){
    if(table.row('.selected').index()>=0){
      $('#clie').val(getId());
      // $('#showFormClient').prop('readonly');
      getClientAjax(getId());
      $('#clientModalDetail').modal();
    }
    else alert('merci de sélectionner un client');
  });

  function getId(){
    if(table.row('.selected').index()>=0){
      idClient=$('tr.selected').attr('id');
    }
    return idClient;
  }

  $('#btnDelete').click(function()
  {
    table.row('.selected').remove().draw(false);
  });

  function getClientAjax(ID){
    $.ajax({
    method: "GET",
    url: "fillClientAjax.php",
    data: { idClient: ID}
  })
  .done(function( msg ) {
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

  function getContactAjax(ID){
    $.ajax({
    method: "GET",
    url: "fillContactAjax.php",
    data: { idClient: ID}
  })
  .done(function( msg ) {
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

  $('#btnLogOut').click(function(){
    alert('shit');
    window.location="ABIAccueil.php";
  })

  // $('#clientTable').dataTable({
  //   "bFilter":false;
  // });

  // $('#clientModalDetail').data(getId(),data).openDialog();






});
