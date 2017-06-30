<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>test</title>
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <?php require ('DAO/abi.DAO.php'); ?>
  </head>
  <body>

    <?php
    $theClientList=abiDAO::ListeClients('utilweb','utilweb');
    ?>
    <div class="table-responsive listeClient">
      <table class="table table-striped table-bordered table-condensed">
        <tr>
          <th></th>
          <th>Selection</th>
          <th>ID client</th>
          <th>Raison sociale</th>
          <th>Ville</th>
          <th>Type société</th>
          <th>Chiffre d'affaire</th>
        </tr>
      <!-- </table>
      <table class="table table-responsive table-striped table-hover"> -->
        <?php
        // var_dump($theClientList);
        // echo sizeof($theClientList[0]);
        for($i=0;$i<sizeof($theClientList);$i++){
          echo '<tr>';
          echo '<td>'.'<a href="#"><img src="img/plus.ico" alt="Afficher détails clients"></a>'.'</td>';
          // echo '<td><input type="radio" name="choixClient" value="client"'.$theClientList[$i]['ID_CLIENT'].'></td>';
          echo '<td><input type="radio" name="choixClient" id="client"'.$theClientList[$i]['ID_CLIENT'].'></td>';
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
      </table>
      <input type="button" name="bouton" value="testChecked" onClick="whoIsChecked()">
      <script type="text/javascript">
      function whoIsChecked(){
        alert(document.getElementById('client1'));
      }

      </script>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">

    </script>
  </body>
</html>
