<?php 
		require('presentation/ABIAfficheClients.vue.php');
		require('DAO/abi.DAO.php');

		//pour se connecter a la BDD
		$user = "utilweb";
		$password='utilweb';

		$dataClient = array();
		$dataClient = abiDAO::ListeClients($user, $password);

		afficheClients($dataClient);
		?>
