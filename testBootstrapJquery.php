<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
    <?php require ('DAO/abi.DAO.php'); ?>
  </head>
  <body>

    <?php
    $theClientList=abiDAO::ListeClients('utilweb','utilweb');
    ?>
    <div class="row">
      <div class="col-xs-2">
        <input id="btnDelete" type="button" name="bouton" value="deleteRow">
        <input id="btnTest" class="btnTest" type="button" name="btnTest" value="alertSelected">
        <input id="btnCreate" class="btnCreate" type="button" name="btnCreate" value="Créer nouveau client">
        <input id="btnDetail" class="btnDetail" type="button" name="btnDetail" value="Détails client">
      </div>
      <div class="col-xs-10">
        <div class="table-responsive listeClient">
          <table id="clientTable" class="display table table-striped table-hover">
            <thead>
            <tr>
              <!-- <th></th>
              <th>Selection</th> -->
              <th>ID client</th>
              <th>Raison sociale</th>
              <th>Ville</th>
              <th>Type société</th>
              <th>Chiffre d'affaire</th>
            </tr>
          </thead>
          <tbody>
            <?php
            for($i=0;$i<sizeof($theClientList);$i++){
              echo '<tr id="'.$theClientList[$i]['ID_CLIENT'].'">';
              // echo '<td>'.'<a href="#"><img src="img/plus.ico" alt="Afficher détails clients"></a>'.'</td>';
              // // echo '<td><input type="radio" name="choixClient" value="client"'.$theClientList[$i]['ID_CLIENT'].'></td>';
              // echo '<td><input type="radio" name="choixClient" id="client"'.$theClientList[$i]['ID_CLIENT'].'></td>';
              echo '<td>'.$theClientList[$i]['ID_CLIENT'];
              echo '</td>';
              echo '<td>'.$theClientList[$i]['RAISON_SOCIALE'];
              echo '</td>';
              echo '<td>'.$theClientList[$i]['VILLE'];
              echo '</td>';
              echo '<td>'.$theClientList[$i]['TYPE_SOCIETE'];
              echo '</td>';
              echo '<td>'.$theClientList[$i]['CA'];
              echo '</td>';
              echo '</tr>';
              }
                ?>
              </tbody>
          </table>

        </div>
      </div>
    </div>

    <div class="modal fade" id="clientModalDetail" data-keyboard="false" data-backdrop="static" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="padding:17px 25px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>Détails client N°=<span id="numIdClient"></span></h4>
          </div>
          <div class="modal-body" style="padding:20px 10%;">
            <form>
              <div id="marge" >
              	<table>
                  <tr >
                    <td > <strong id="clie1"> Id client : </strong></td>
                    <td> <input type="text" id="clie" name="client"></td>
                    <td></td>
                    <td></td>
                  </tr>
              	 <tr >
              		 <td > <strong id="raiso1"> Raison sociale : </strong></td>
              		 <td> <input type="text" id="raisonSociale" name="nom">  </td>
              		 <td></td>
              		 <td></td>
              	 </tr>

              	 <tr >
              		 <td > <strong>Adresse :</strong> </td>
              		 <td> <input type="text" id="adresse" name="adresse" > </td>
              		 <td></td>
              		 <td></td>
              	 </tr>
              	 <tr >
              		<td > <strong>Ville :</strong> </td>
              		<td> <input type="text" id="ville" name="ville" > </td>
              		<td id="cp1"> <strong>Code postal : </strong> </td>
              		<td>  <input type="text" id="cp" name="codpostal" > </td>
              	</tr>
              	<tr >
              	 <td > <strong>Téléphonne :</strong> </td>
              	 <td> <input type="text" id="tel" name="tel" > </td>
              	 <td></td>
              	 <td></td>
               </tr>
               <tr >
              	<td > <strong>Domaine d'activité :</strong> </td>
              	<td> <input type="text" id="activite" name="domaine" > </td>
              	<td id="cp1"> <strong>Type client : </strong> </td>
              	<td>  <input type="text" id="typeSociete" name="type" > </td>
              </tr>
              <tr >
               <td > <strong>Nature :</strong> </td>
               <td> <input type="text" id="nature" name="nature" > </td>
               <td id="cp1"> <strong>Effectifs : </strong> </td>
               <td>  <input type="text" id="effectif" name="effectif" > </td>
              </tr>
              <td > <strong>Chiffre d'affaire :</strong> </td>
              <td> <input type="text" id="ca" name="nature" > </td>
              <td></td>
              <td></td>
              </tr>
              </tr>
              <td > <strong>Commentaires :</strong> </td>
              <td> <input type="text" id="commentCom" name="comment" > </td>
              <td></td>
              <td></td>
              </tr>
            </table>
            <br/>
              <input type="button" id="btnQuitter" class="btn btn-default" data-dismiss="modal" value="Quitter">
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.js"></script> -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js">

    </script>


    <script type="text/javascript" src="testBootstrapJquery.js"></script>
  </body>
</html>
