<?php
function afficheMenu($val){ ?>
  <div class="menu" style="width:100%; height:15%; margin-top: 3%; margin-left:4%;">
    <div class="row">
      <!-- logo -->
      <div class="col-md-2">
        <img src="img/logoAbi.jpg" alt="logoAbi">
      </div>
      <!-- menu -->
      <div class="col-md-9 col-md-offset1">
          <ul class="nav nav-tabs">
            <?php if ($val== 1){?>
              <li role="presentation" class="active"><a href="#">Accueil Gestion Commerciale</a></li>
              <li role="presentation"><a href="ABICreatClie.php">Ajouter un client</a></li>
            <?php } else {?>
            <li role="presentation" ><a href="ABIAfficheClients.php">Accueil Gestion Commerciale</a></li>
            <li role="presentation"class="active"><a href="ABICreatClie.php">Ajouter un client</a></li>
            <?php } ?>
          </ul>
      </div>
    </div>
  </div>
  <span class="border-0">
  <div class="bonjourclient">
      <h3>Bonjour :</h3>
      <button type="button" id="btnLogOut" class="btn btn-outline-success">Log Out</button>
  </div>
  </span>
<?php } ?>
