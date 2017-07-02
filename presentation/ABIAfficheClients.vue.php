<?php //*****PHP ecran 2 *****
// session_start();

// chargement des fonctions d'affichages
require('presentation\ABIEntete.vue.php');
require('presentation\ABIMenu.vue.php');
// require('presentation/ABIMenu.vue.php');
function afficheClients($dataClient){
	$val = 1;
?>

<?php afficheEntete(); ?>
</head>
<body>
	<header>
		<?php afficheMenu($val); ?>
	</header>
	<div class="row" style="margin-top:1%">
		<div class="col-xs-2" align="center">
			<ul style="list-style:none">
				<li><input id="btnDelete" class="btn btn-lg btn-danger" type="button" name="bouton" value="deleteRow" style="width:90%;margin-top:30%"></li>
				<li><input id="btnDetail" class="btnDetail btn btn-lg btn-default" type="button" name="btnDetail" value="Détails client" style="width:90%;margin-top:10%"></li>
				<li><input id="btnModify" class="btnModify btn btn-lg btn-default" type="button" name="btnModify" value="Modifier client" style="width:90%;margin-top:10%"></li>
			</ul>
		</div>
		<div class="col-xs-9">
			<div class="table-responsive listeClient">
				<table id="clientTable" class="display table table-striped table-hover" style="width:95%">
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
					for($i=0;$i<sizeof($dataClient);$i++){
						echo '<tr id="'.$dataClient[$i]['ID_CLIENT'].'">';
						// echo '<td>'.'<a href="#"><img src="img/plus.ico" alt="Afficher détails clients"></a>'.'</td>';
						// // echo '<td><input type="radio" name="choixClient" value="client"'.$theClientList[$i]['ID_CLIENT'].'></td>';
						// echo '<td><input type="radio" name="choixClient" id="client"'.$theClientList[$i]['ID_CLIENT'].'></td>';
						echo '<td>'.$dataClient[$i]['ID_CLIENT'];
						echo '</td>';
						echo '<td>'.$dataClient[$i]['RAISON_SOCIALE'];
						echo '</td>';
						echo '<td>'.$dataClient[$i]['VILLE'];
						echo '</td>';
						echo '<td>'.$dataClient[$i]['TYPE_SOCIETE'];
						echo '</td>';
						echo '<td>'.$dataClient[$i]['CA'];
						echo '</td>';
						echo '</tr>';
						}
							?>
						</tbody>
				</table>
			</div>
		</div>
	</div>

<!-- Details du client selectionne, affichage avec bootstrap -->
	<div class="modal fade" id="clientModalDetail" data-keyboard="false" data-backdrop="static" role="dialog" >
		<div class="modal-dialog" >
			<div class="modal-content" >
				<div class="modal-header" style="padding:2% 3%; background-color:#5BD6A3">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3>Détails client N°: <span id="numIdClient"></span></h3>
				</div>
				<div class="modal-body" >
					<form id="showFormClient" class="form-horizontal" >
						<div class="form-group">
							<label for="idClient" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Id client : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="idClient" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="raisonSociale" class="col-sm-3 col-md-offset-1 control-label"style="color:black;">Raison sociale : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="raisonSociale" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="numeroRue" class="col-sm-3 col-md-offset-1 control-label"style="color:black;">Numéro : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="numeroRue" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="nomRue" class="col-sm-3 col-md-offset-1 control-label"style="color:black;">Rue : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="nomRue" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="codePostal" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Code postal : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="codePostal" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="ville" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Ville : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="ville" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="telephone" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">numéro : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="telephone" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="activite" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Domaine d'activité : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="activite"  readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="nature" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Nature : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="nature"  readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="ca" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Chiffre d'affaire : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="ca"  readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="effectif" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Effectif : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="effectif" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="commentCom" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Commentaire : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="commentCom" readonly>
							</div>
						</div>
					<br/>
						<input type="button" id="btnQuitter" class="btn btn-default" data-dismiss="modal" value="Quitter">
					</form>
				</div>
			</div>
		</div>

	</div>
</body>
</html>
<?php } ?>
