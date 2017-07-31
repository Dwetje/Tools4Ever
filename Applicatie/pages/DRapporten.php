<?php
    if ($_SESSION['L_ADMINID'] == "Directie" && $_SESSION['L_STATUS'] === 2) {
      $locatieQ = "SELECT * FROM locatie";
      $locatiestmt = $db -> prepare($locatieQ);
      $locatiestmt->execute();
      $locatieQV = "SELECT * FROM locatie";
      $locatiestmtV = $db -> prepare($locatieQV);
      $locatiestmtV->execute();
      $locatieQB = "SELECT * FROM locatie";
      $locatiestmtB = $db -> prepare($locatieQB);
      $locatiestmtB->execute();
?>
<html>
  <head>
      <title>Test-Dashboard</title>
      <link rel="stylesheet" type="text/css" href="css/style.css"/>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
      <script>
        $(function() {
          $( "#pageTabs" ).tabs();
        });
      </script>
      <script type="text/javascript">
        function confirmRapporten(){
            location.href='index.php?page=DRapporten';
        }
        function confirmCRUD(){
            location.href='index.php?page=DCrud';
        }
        function confirmProduct(){
            location.href='index.php?page=DProduct';
        }
        function confirmLogout(){
          var logout = confirm("Weet u zeker dat u wilt uitloggen?");
          if (logout) { location.href='index.php?page=uitloggen';}
        }
      </script>
  </head>
  <body class="sub-index">
    <div class="content-wrapper">
      <div class="sub-header">
        <div class="col-md-12">
          <div id="top_nav">
            <div class="col-md-10">
                <!-- <div class="logo"><h1>ToolsForEver</h1></div> -->
            </div>
            <div class="col-md-1">
              <div class="user">
                <p>Welkom: <?php echo $_SESSION['L_NAME'];?></p>
              </div>
            </div>
            <div class="col-md-1">
              <button type="button" class="btn btn-default" onclick="confirmLogout()">Uitloggen</button>
            </div>
          </div>
          <div class="main_nav">
            <table>
              <tr>
                <td class="main_nav_button">
                  <div onclick="confirmRapporten()">Rapporten</div>
                </td>
                <td class="main_nav_button">
                  <div onclick="confirmCRUD()">CRUD</div>
                </td>
                <td class="main_nav_button">
                  <div onclick="confirmProduct()">Product zoeken/inzien</div>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="rapporten">
            <div id='pageTabs'>
                  <ul>
                    <li><a href="#tabs-1">Waarde Voorraad</a></li>
                    <li><a href="#tabs-2">Voorraad</a></li>
                    <li><a href="#tabs-3">Bestellijst</a></li>
                  </ul>
                  <div id='tabs-1' title='waardeVoorraad'>
                    <table id='tableWaardeVoorraad' class="table table-striped">
                      <tbody>
                        <th colspan="7">Waarde Voorraad <b class='glyphicon glyphicon-exclamation-sign' data-toggle="tooltip" title=""></b><?php ?></th>
                        <tr>
                          <td><strong>Product</strong></td>
                          <td><strong>Type</strong></td>
                          <td><strong>Fabriek</strong></td>
                          <td><strong>Aantal</strong></td>
                          <td><strong>Prijs</strong></td>
                          <td><strong>Waarde Inkoopprijs</strong></td>
                          <td><strong>Waarde Verkoopprijs</strong></td>
                        </tr>
                        <?php
                          $locationCounter = 0;
                          $prijsPerLocatieInkoop = 0;
                          $prijsPerLocatieVerkoop = 0;
                          $eindTotaalInkoop = 0;
                          $eindTotaalVerkoop = 0;
                          while ($locatieRow = $locatiestmt->fetchAll(PDO::FETCH_ASSOC)) {
                            foreach ($locatieRow as $locatieInfo => $locatieValue) {
                              echo "<tr><td colspan='7' class='locatieH'>" . $locatieValue['locatie'] . "<td><tr>";
                              $productPerLocatieQ = "SELECT * FROM voorraad INNER JOIN locatie INNER JOIN product INNER JOIN fabriek on voorraad.locatieID = locatie.locatieID AND voorraad.productID = product.productID AND product.fabriekID = fabriek.fabriekID WHERE locatie.locatieID = ?";
                              $waardeVoorraadstmt = $db -> prepare($productPerLocatieQ);
                              // $waardeVoorraadstmt -> bindparam(':locatieID', $locatieValue['locatieID']);
                              $waardeVoorraadstmt->execute(array($locatieValue['locatieID']));
                              $waardeVoorraadRow = $waardeVoorraadstmt->fetchAll(PDO::FETCH_ASSOC);
                              foreach ($waardeVoorraadRow as $waardeVoorraadKey => $waardeVoorraadValue) {
                                  // echo $waardeVoorraadValue['fabrieknaam'];
                                  $wInkoopprijs = $waardeVoorraadValue['inkoopprijs'] * $waardeVoorraadValue['aantal'];
                                  $wVerkoopprijs = $waardeVoorraadValue['verkoopprijs'] * $waardeVoorraadValue['aantal'];
                                    echo "<tr>
                                            <td>" . $waardeVoorraadValue['productnaam'] ."</td>
                                            <td>" . $waardeVoorraadValue['type'] ."</td>
                                            <td>" . $waardeVoorraadValue['fabrieknaam'] ."</td>
                                            <td>" . $waardeVoorraadValue['aantal'] ."</td>
                                            <td> &euro; " . $waardeVoorraadValue['inkoopprijs'] . "</td>
                                            <td> &euro; " . $wInkoopprijs ."</td>
                                            <td> &euro; " . $wVerkoopprijs ."</td>
                                          </tr>";
                                    $eindTotaalInkoop += $wInkoopprijs;
                                    $eindTotaalVerkoop += $wVerkoopprijs;
                              }
                            }
                            echo "<tr><td></td><td></td><td></td><td></td><td>Eindtotaal</td><td> &euro; " . $eindTotaalInkoop . "</td><td> &euro; " . $eindTotaalVerkoop . "</td><tr>";
                          }
                      ?>
                      </tbody>
                    </table>
                  </div>
                  <div id='tabs-2' title='Voorraad'>
                    <table id='tableVoorraad' class="table table-striped">
                      <tbody>
                        <th colspan="6">Voorraad <b class='glyphicon glyphicon-exclamation-sign' data-toggle="tooltip" title=""></b><?php ?></th>
                        <tr>
                          <td><strong>Product</strong></td>
                          <td><strong>Type</strong></td>
                          <td><strong>Fabriek</strong></td>
                          <td><strong>Aantal</strong></td>
                          <td><strong>Inkoopprijs</strong></td>
                          <td><strong>Verkoopprijs</strong></td>
                        </tr>
                        <?php
                          while ($locatieRow2 = $locatiestmtV->fetchAll(PDO::FETCH_ASSOC)) {
                            foreach ($locatieRow2 as $locatieInfo2 => $locatieValue2) {
                              echo "<tr><td colspan='6' class='locatieH'>" . $locatieValue2['locatie'] . "<td><tr>";
                              $voorraadQ = "SELECT * FROM voorraad INNER JOIN locatie INNER JOIN fabriek INNER JOIN product on voorraad.locatieID = locatie.locatieID AND voorraad.productID = product.productID AND product.fabriekID = fabriek.fabriekID WHERE locatie.locatieID = ?";
                              $stmt = $db -> prepare($voorraadQ);
                              $stmt->execute(array($locatieValue2['locatieID']));
                              $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                              foreach ($row as $key => $value) {
                                  echo "<tr>
                                          <td>" . $value['productnaam'] ."</td>
                                          <td>" . $value['type'] ."</td>
                                          <td>" . $value['fabrieknaam'] ."</td>
                                          <td>" . $value['aantal'] ."</td>
                                          <td> &euro; " . $value['inkoopprijs'] ."</td>
                                          <td> &euro; " . $value['verkoopprijs'] ."</td>
                                        </tr>";
                              }
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div id='tabs-3' title='Bestellijst'>
                    <table id='tableBestellijst' class="table table-striped">
                      <tbody>
                        <th colspan="5">Bestellijst <b class='glyphicon glyphicon-exclamation-sign' data-toggle="tooltip" title=""></b><?php ?></th>
                        <tr>
                          <td><strong>Product</strong></td>
                          <td><strong>Type</strong></td>
                          <td><strong>Fabriek</strong></td>
                          <td><strong>Minimumaantal</strong></td>
                          <td><strong>Aantal te bestellen</strong></td>
                        </tr>
                        <?php
                        while ($locatieRow3 = $locatiestmtB->fetchAll(PDO::FETCH_ASSOC)) {
                          foreach ($locatieRow3 as $locatieInfo3 => $locatieValue3) {
                            echo "<tr><td colspan='5' class='locatieH'>" . $locatieValue3['locatie'] . "<td><tr>";
                            $bestellijstQ = "SELECT * FROM voorraad INNER JOIN locatie INNER JOIN product on voorraad.locatieID = locatie.locatieID AND voorraad.productID = product.productID WHERE voorraad.minimumaantal > voorraad.aantal AND locatie.locatieID = ?";
                            $bestellijststmt = $db -> prepare($bestellijstQ);
                            $bestellijststmt->execute(array($locatieValue3['locatieID']));
                            $bestllijstRow = $bestellijststmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($bestllijstRow as $bestllijstKey => $bestllijstValue) {
                              // var_dump ($bestllijstRow);
                              // var_dump ($bestllijstValue['productnaam']);
                              $bMinimumaantal = $bestllijstValue['minimumaantal'];
                              $bAantal = $bestllijstValue['aantal'];
                              $bBestellen = $bMinimumaantal - $bAantal;
                              echo "<tr>
                                      <td>" . $bestllijstValue['productnaam'] . "</td>
                                      <td>" . $bestllijstValue['type'] . "</td>
                                      <td>" . $bestllijstValue['fabriekID'] . "</td>
                                      <td>" . $bestllijstValue['minimumaantal'] . "</td>
                                      <td>" . $bBestellen . "</td>
                                    </tr>";
                            }
                          }
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php
} else {
    echo "<script>
          alert('U bent niet ingelogged!');
          location.href='index.php?page=uitloggen';
          </script>";
}
?>
