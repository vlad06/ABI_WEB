
<?php
require('presentation\ABIEntete.vue.php');
require('presentation\ABIMenu.vue.php');
?>
<script type="text/javascript" src="../Cas_ABI/javascript/ABICreatClie.js"></script>

<html>
<head> <link rel="stylesheet" href="../Cas_ABI/css/theme.css">
</head>
	</html>
<?php
function afficheEcranCreat(){
?>

<?php afficheEntete(); ?>

<body>
	<header>
		<?php afficheMenu(2); ?>
	</header>
		<div id="creation">
<span>Ajouter un nouveau client :</span>
</div>



</br>

<form action="ABICreatClie2.php" onsubmit="return verifForm(this)" method="post" id="val">
<div id="marge" >

	<TABLE >
    <tr >
      <td > <strong id="clie1"> Id client : </strong></td>
      <td> <input type="text" id="clie" name="client" onblur="verifIDclie(this)">  </td>
      <td id="cliexiste">  <strong > client déjà existant </strong>    </td>
      <td></td>
    </tr>
	 <tr >
		 <td > <strong id="raiso1"> Raison sociale : </strong></td>
		 <td> <input type="text" id="raiso" name="nomrais" onblur="verifRaison(this)">  </td>
		 <td></td>
		 <td></td>
	 </tr>

	 <tr >
		 <td > <strong id="adr1">Adresse :</strong> </td>
		 <td> <input type="text" id="adr" name="adresse" onblur="verifAdresse(this)"> </td>
		 <td></td>
		 <td></td>
	 </tr>
	 <tr >
		<td > <strong id="vill1">Ville :</strong> </td>
		<td> <input type="text" id="nom" name="ville"  onblur="verifVille(this)"> </td>

    <td id="cp1"> <strong>Code postal : </strong> </td>
		<td>  <input type="text" id="cp" name="codpostal" onblur="verifCp(this)" > </td>
	</tr>
	<tr >
	 <td > <strong id="tel1">Téléphonne :</strong> </td>
	 <td> <input type="text" id="nom" name="tel" onblur="verifTel(this)"> </td>
	 <td></td>
	 <td></td>
 </tr>
 <tr >
	<td > <strong id="act1">Domaine d'activité :</strong> </td>
	<td> <input type="text" id="nom" name="domaine" onblur="verifAct(this)"> </td>

	<td id="typ1"> <strong>Type client : </strong> </td>
	<td>  <input type="text" id="type" name="type"  onblur="verifTyp(this)"> </td>
</tr>
<tr >
 <td > <strong id="nat1">Nature :</strong> </td>
 <td> <input type="text" id="nom" name="nature" onblur="verifNat(this)"> </td>

 <td id="eff1"> <strong>Effectifs : </strong> </td>
 <td>  <input type="text" id="cp" name="effectif" onblur="verifEff(this)"> </td>
</tr>
<td > <strong id="ca1">Chiffre d'affaire :</strong> </td>
<td> <input type="text" id="nom" name="chaff" onblur="verifCaf(this)"> </td>
<td></td>
<td></td>
</tr>
</tr>
<td > <strong>Commentaires :</strong> </td>
<td> <input type="text" id="adr" name="comment" > </td>
<td></td>
<td></td>
</tr>
	</TABLE>
</br>
	<span><input type="submit" id="controle" value="Enregistrer"></span>
</div>
</form>


</body>
<?php } ?>
