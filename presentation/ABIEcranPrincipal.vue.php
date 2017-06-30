<?php //************** code PHP objet en couches**************
		// script affichage ecran principal site ABI

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
	<header>
		<?php afficheTitre(); ?>
	</header>
</body>
<footer>
  <?php afficheFooter(); ?>
</footer>
</html>
<?php } ?>
