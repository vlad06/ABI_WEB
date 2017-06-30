<?php //***** code PHP couche *****
 		// script lister les films d'un type particulier
		//rechercher des films du type demande en VCOResa
		//affichage en tableau avec  liens href vers VCIResa3

		require('presentation/ABIEcranPrincipal.vue.php');
		require('DAO/abi.DAO.php');


		//pour se connecter a la BDD
		$user = "utilweb";
		$password='utilweb';

		//recuperation des donnes du type de film choisie
		$rowTypeFilm = VideoDAO::retourneTypeFilm($user, $password, $_GET['typef']);
		// echo $rowTypeFilm;
		//recupere la liste de films du typa choisi
		$dataFilms= array();
		$dataFilms= VideoDAO::listeFilmsParType($user, $password, $_GET['typef']);

			//presentation
			afficheListeFilms($rowTypeFilm, $dataFilms);
		?>
