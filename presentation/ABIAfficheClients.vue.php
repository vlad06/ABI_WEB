<?php //*****PHP ecran 2 *****
// session_start();

// chargement des fonctions d'affichages
require('presentation\ABIEntete.vue.php');
require('presentation\ABIMenu.vue.php');
require('presentation\ABIFooter.vue.php');
function afficheClients($dataClient){
	$menuAfficher = 1;
?>

<?php afficheEntete(); ?>
</head>
<body>
	<header>
		<?php afficheMenu($menuAfficher); ?>
	</header>
	<section class="corpsAffCli">
		<h2 >Liste de tous nos clients:</h2>
		<div class="row" style="margin-top:1%">
			<div class="col-md-3 col-sg-3" align="center">
				<ul style="list-style:none" class="boutonsListeClients">
					<li><input id="btnDetail" class="btnDetail btn btn-lg btn-default" type="button" name="btnDetail" value="Détails client" style="width:90%;"></li>
					<li><input id="btnModifier" class="btnModify btn btn-lg btn-default" type="button" name="btnModifier" value="Modifier client" style="width:90%;"></li>
					<li><button id="btnContact" class="btn btn-lg btn-default" type="button" name="btnContact" style="width:90%;">Contacts</button></li>
				</ul>
			</div>
		<div class="col-md-8 col-lg-8 col-xs-12">
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
</section>

<!-- Details du client selectionne, affichage avec bootstrap mode readonly-->
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
					<input type="button" id="btnQuitterAfficheClts" class="btn btn-default" data-dismiss="modal" value="Quitter">
					<input type="button" id="btnAfficherContacts" class="btn btn-default"  value="Afficher les contacts">
					</form>
				</div>
			</div>
		</div>
	</div>


<!-- modal ccontact -->

	<div class="modal fade" id="contactModalDetail" data-keyboard="false" data-backdrop="static" role="dialog" >
		<div class="modal-dialog" >
			<div class="modal-content" >
				<div class="modal-header" style="padding:2% 3%; background-color:#5BD6A3">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3>contact N°: <span id="RSClient"></span></h3>
				</div>
				<div class="modal-body" >
					<form id="showFormContact" class="form-horizontal" >
						<div id="contactList" class="table-responsive contactList">
							<table id="contactTable" class="display table table-striped table-hover">
								<!-- <thead>
									<tr>
										<th>ID client</th>
										<th>ID contact</th>
										<th>Nom</th>
										<th>Prenom</th>
										<th>Téléphone</th>
										<th>Email</th>
										<th>fonction</th>
									</tr>
								</thead>
								<tbody>
									<tr>

								</tbody> -->
							</table>
						</div>

					<br/>

					</form>
				</div>
			</div>
		</div>

	</div>

<!-- modal pour modif des clients -->
<form action= "" method="post" id="modifClient">
	<div class="modal fade" id="clientModalModif" data-keyboard="false" data-backdrop="static" role="dialog" >
		<div class="modal-dialog" >
			<div class="modal-content" >
				<div class="modal-header" style="padding:2% 3%; background-color:#5BD6A3">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3>Modification du client N°: <span id="numIdClientModif"></span></h3>
				</div>
				<div class="modal-body" >
					<form id="showClientModif" class="form-horizontal" >
						<div class="form-group">
							<label for="idClient" class="col-sm-3 col-md-offset-1 control-label" style="color:black;" readonly>Id client : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="idClientModif">
							</div>
						</div>
						<div class="form-group">
							<label for="raisonSociale" class="col-sm-3 col-md-offset-1 control-label"style="color:black;">Raison sociale : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="raisonSocialeModif">
							</div>
						</div>
						<div class="form-group">
							<label for="numeroRue" class="col-sm-3 col-md-offset-1 control-label"style="color:black;">Numéro : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="numeroRueModif">
							</div>
						</div>
						<div class="form-group">
							<label for="nomRue" class="col-sm-3 col-md-offset-1 control-label"style="color:black;">Rue : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="nomRueModif">
							</div>
						</div>
						<div class="form-group">
							<label for="codePostal" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Code postal : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="codePostalModif">
							</div>
						</div>
						<div class="form-group">
							<label for="ville" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Ville : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="villeModif">
							</div>
						</div>
						<div class="form-group">
							<label for="telephone" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">numéro : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="telephoneModif" >
							</div>
						</div>
						<div class="form-group">
							<label for="activite" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Domaine d'activité : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="activiteModif">
							</div>
						</div>
						<div class="form-group">
							<label for="nature" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Nature : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="natureModif">
							</div>
						</div>
						<div class="form-group">
							<label for="ca" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Chiffre d'affaire : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="caModif">
							</div>
						</div>
						<div class="form-group">
							<label for="effectif" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Effectif : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="effectifModif">
							</div>
						</div>
						<div class="form-group">
							<label for="commentCom" class="col-sm-3 col-md-offset-1 control-label" style="color:black;">Commentaire : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="commentComModif">
							</div>
						</div>
					<br/>
					<input type="button" id="btnQuitterModifClt" class="btn btn-default" data-dismiss="modal" value="Quitter">
					<input type="submit" id="btnEnregistModifClt" class="btn btn-default"  value="Enregistrer les modifications">
					</form>
				</div>
			</div>
		</div>
	</div>
</form>

</body>
	<?php afficheFooter(); ?>
</html>
<?php } ?>
