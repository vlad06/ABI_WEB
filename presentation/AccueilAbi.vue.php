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

	<form	action= "#" onsubmit="return controleIdentAjax(document.getElementById('login'), document.getElementById('motpasse'));" id="formConnection">
		<h2 id="pourVousConnect">Pour vous connecter...</h2>
		<fieldset>

			<!-- div qui englobe le label icon et textbox du "user" -->
			<div class="ligneUser">
				<label for="user" class="lbluser">USER</label>
				<div class="valUtil">
						<img src="img/bonhome.png" alt="icon utilisateur" height="25" id="iconutilisateur">
						<input type="text" name="email" id="login" onfocus="viderreur();" />
				</div>
			</div>
			<!-- div qui englobe le label password, son icon et textbox du "password" -->
			<div class="lignePassword">
				<label for="password">PASSWORD</label>
				<div class="valMotPasse">
					<img src="img/cadenas.png" alt="icon cadenas" height="25" id="iconcadenas">
					<input type="password" name="pssw" id="motpasse" onfocus="this.value='';" />
				</div>
			</div>
			<div class="ligneBoutons">
				<input type="submit" id ="submit" value="Envoyer" />
				<input type="reset" id="reset" value="Recommencer" />
			</div>

			<font color="red"><span id="lblErreur"></span></font>&nbsp;</td>
		</fieldset>
	</form>
	</div>
	<div id="myGoogleMap" style="width:100%; height:350px;"></div>
  <script src="javascript/abiMap.js"></script>
  <script src="javascript/ajax.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjgbgdUIV-kNbksWtQuEx8gDPrnOmqChI&callback=initMap"></script>

  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6TIimhB-BVvadvVcIBPk4uSb9O8IJHSc&callback=initMap"></script> -->
</body>
<footer>
	<?php afficheFooter(); ?>
</footer>
</html>
<?php } ?>
