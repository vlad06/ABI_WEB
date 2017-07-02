<?php //************** code PHP objet en couches**************
		// script affichage page d'accueil site ABI

// chargement des fonctions d'affichages
require('presentation/ABIEntete.vue.php');
require('presentation/ABITitre.vue.php');
require('presentation/ABIFooter.vue.php');

// require('presentation/ABIMenu.vue.php');

function afficheEcranAccueil(){
?>
<?php afficheEntete() ?>
</head>
<body>
	<header style="width:100%; height:10%; margin-top: 3%;">
		<?php afficheTitre(); ?>
	</header>
	<div id="msgLogin"></div>
	<form	method="POST" id="formConnexion" action="">
		<h2 id="pourVousConnect">Pour vous connecter...</h2>
		<fieldset>
			<!-- div qui englobe le label icon et textbox du "user" -->
			<div class="ligneUser">
				<label for="user" class="lbluser">USER</label>
				<div class="valUtil">
						<img src="img/bonhome.png" alt="icon utilisateur" height="25" id="iconutilisateur">
						<input type="text" name="login" id="login" />
				</div>
			</div>
			<!-- div qui englobe le label password, son icon et textbox du "password" -->
			<div class="lignePassword">
				<label for="password">PASSWORD</label>
				<div class="valMotPasse">
					<img src="img/cadenas.png" alt="icon cadenas" height="25" id="iconcadenas">
					<input type="password" name="password" id="password" />
				</div>
			</div>
			<div class="ligneBoutons">
				<input type="submit" id ="btnSubmit" value="Connecter" />
				<input type="reset" id="reset" value="Recommencer" />
			</div>
			<font color="red"><span id="lblErreur"></span></font>&nbsp;</td>
		</fieldset>
	</form>
	</div>
	<div id="myGoogleMap" style="width:100%; height:350px;"></div>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjgbgdUIV-kNbksWtQuEx8gDPrnOmqChI&callback=initMap"></script>
</body>
<footer>
	<?php afficheFooter(); ?>
</footer>
</html>
<?php } ?>
