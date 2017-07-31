<?php
    if ($_SESSION['L_ADMINID'] == "Directie" && $_SESSION['L_STATUS'] === 2) {
  // product
  try {
    if (isset($_POST['productAddRecord'])) {
      include ('ProductToevoegen.php');

    }
  } catch (PDOException $e) {
      echo $e->getMessage();
  }
  try {
      if (isset($_POST['productUpdateRecord'])) {
        $_SESSION['updateProductID'] = $_POST['productID'];
        $_SESSION['updateProductNaam'] = $_POST['productNaam'];
        $_SESSION['updateProductType'] = $_POST['productType'];
        $_SESSION['updateProductInkoopprijs'] = $_POST['productInkoop'];
        $_SESSION['updateProductVerkoopprijs'] = $_POST['productVerkoop'];
          echo "<script>location.href='Index.php?page=ProductMuteren';</script>";
      }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

  // voorraad
  try {
    if (isset($_POST['voorraadAddRecord'])) {
      $_SESSION['addVoorraadNaam'] = $_POST['voorraadNaam'];
      $_SESSION['addVoorraadProduct'] = $_POST['voorraadProduct'];
      $_SESSION['addVoorraadType'] = $_POST['voorraadType'];
      $_SESSION['addVoorraadFabriek'] = $_POST['voorraadFabriek'];
      $_SESSION['addVoorraadAantal'] = $_POST['voorraadAantal'];
      $_SESSION['addVoorraadInkoop'] = $_POST['voorraadInkoop'];
      $_SESSION['addVoorraadVerkoop'] = $_POST['voorraadVerkoop'];
      echo "<script>location.href='Index.php?page=VoorraadToevoegen';</script>"; // X
    }
  } catch (PDOException $e) {
      echo $e->getMessage();
  }

// Medewerker
  try {
    if (isset($_POST['medewerkerAddRecord'])) {
      include ('MedewerkerToevoegen.php');
    }
  } catch (PDOException $e) {
      echo $e->getMessage();
  }
  try {
      if (isset($_POST['$rolmedewerkerUpdateRecord'])) {
        $_SESSION['updateMedewerkerID'] = $_POST['gebruikerID'];
        $_SESSION['updateMedewerkerNaam'] = $_POST['medewerkerNaam'];
        $_SESSION['updateMedewerkerWW'] = $_POST['medewerkerWachtwoord'];
        $_SESSION['updateMedewerkerV'] = $_POST['medewerkerVoorletters'];
        $_SESSION['updateMedewerkerT'] = $_POST['medewerkerTussenvoegsel'];
        $_SESSION['updateMedewerkerA'] = $_POST['medewerkerAchternaam'];
        $_SESSION['updateMedewerkerTel'] = $_POST['medewerkerTelefoon'];
        $_SESSION['updateMedewerkerE'] = $_POST['medewerkerEmail'];
        $_SESSION['updateMedewerkerR'] = $_POST['medewerkerRol'];
        echo "<script>location.href='Index.php?page=MedewerkerMuteren';</script>"; // X
      }
  } catch (PDOException $e) {
        echo $e->getMessage();
  }
  try {
      if (isset($_POST['medewerkerDeleteRecord'])) {
        $_SESSION['deleteMedewerkerID'] = $_POST['gebruikerID'];
        echo "<script>location.href='Index.php?page=MedewerkerVerwijderen';</script>";  // X
      }
  } catch (PDOException $e) {
        echo $e->getMessage();
  }
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
          <div class="crud">
            <div id='pageTabs'>
                  <ul>
                    <li><a href="#tabs-1">Product</a></li>
                    <li><a href="#tabs-2">Voorraad</a></li>
                    <li><a href="#tabs-3">Medewerker</a></li>
                  </ul>
                  <div id='tabs-1' title='Product'>
                    <table id="productTable" class="table table-striped">
                      <tbody>
                        <th colspan="7">Product</th>
                        <tr>
                          <td><strong>Voeg product toe</strong></td>
                        </tr>
                        <tr>
                          <td><strong>Product</strong></td>
                          <td><strong>Type</strong></td>
                          <td><strong>Fabriek</strong></td>
                          <td><strong>Inkoopprijs</strong></td>
                          <td><strong>Verkoopprijs</strong></td>
                          <td></td>
                        </tr>
                        <?php
                            $productAddQ = "SELECT * FROM product INNER JOIN fabriek on product.fabriekID = fabriek.fabriekID";
                            $productAddstmt = $db -> prepare($productAddQ);
                            $productAddstmt->execute();
                            $productAddRow = $productAddstmt->fetchAll(PDO::FETCH_ASSOC);
                            echo "<form method='post' action='' onsubmit='' id='formulier' enctype='multipart/form-data'>
                                    <tr>
                                      <td><input type='text' name='productNaam'></td>
                                      <td><input type='text' name='productType'></td>
                                      <td><select type='text' name='productFabriek'>";
                            foreach ($productAddRow as $productAddKey => $productAddValue) {
                              echo "<option value='" . $productAddValue['fabriekID'] . "'> " . $productAddValue['fabriekID'] . "</option>";
                            }
                            echo "</select></td>
                                      <td><input type='text' name='productInkoop'></td>
                                      <td><input type='text' name='productVerkoop'></td>
                                      <td><button type='submit' name='productAddRecord' value='true'  class='btn btn-primary btn-lg' data-toggle='modal'>Voeg toe</button></td>
                                    </tr>
                                  </form>";

                        ?>
                        <td><strong>Overzicht</strong></td>
                        <tr>
                          <td><strong>Product</strong></td>
                          <td><strong>Type</strong></td>
                          <td><strong>Fabriek</strong></td>
                          <td><strong>Inkoopprijs</strong></td>
                          <td><strong>Verkoopprijs</strong></td>
                          <td></td>
                        </tr>
                        <?php
                        $productQ = "SELECT * FROM product";
                        $stmt = $db -> prepare($productQ);
                        $stmt->execute();
                        $fabriekQ = "SELECT * FROM fabriek";
                        $fabriekstmt = $db -> prepare($fabriekQ);
                        $fabriekstmt->execute();
                        $fabriekRow = $fabriekstmt->fetchAll(PDO::FETCH_ASSOC);
                            while ($productRow = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $pID = $productRow['productID'];
                                $pNaam = $productRow['productnaam'];
                                $pType = $productRow['type'];
                                // $pFabriek = $row['fabrieknaam'];
                                $pInkoopprijs = $productRow['inkoopprijs'];
                                $pVerkoopprijs = $productRow['verkoopprijs'];
                                $pAddStatus = $productRow['productAddStatus'];
                                echo "<tr>
                                        <form method='post' action='' onsubmit='' id='formulier' enctype='multipart/form-data'>
                                        <td><input name='productNaam' type='text' placeholder='" . $pNaam . "' value='" . $pNaam . "'></td>
                                        <td><input name='productType' type='text' placeholder='" . $pType . "' value='" . $pType . "'></td>
                                        <td><select type='text' name='productFabriek'>";
                                foreach ($fabriekRow as $fabriekKey => $fabriekValue) {
                                  echo "<option value='" . $fabriekValue['fabriekID'] . "'> " . $fabriekValue['fabriekID'] . "</option>";
                                }
                                echo    "></td>
                                        <td><input name='productInkoop' type='text' placeholder='" . $pInkoopprijs . "' value='" . $pInkoopprijs . "'></td>
                                        <td><input name='productVerkoop' type='text' placeholder='" . $pVerkoopprijs . "' value='" . $pVerkoopprijs . "'><input type='hidden' value='" . $pID . "' name='productID'></td>
                                        ";
                                if ($pAddStatus == 1) {
                                  echo "<td><button type='submit' name='disabled' class='btn btn-primary btn-lg' data-toggle='modal'>Nonactief</button></td>";
                                }else {
                                  echo "<td><button type='submit' name='enabled' class='btn btn-primary btn-lg' data-toggle='modal'>Actief</button> </td>";
                                }
                                echo    "<td><button type='submit' name='productUpdateRecord' value='true'  class='btn btn-primary btn-lg' data-toggle='modal'>Update</button></td>
                                        <td><button type='submit' name='productDeleteRecord' value='true'  class='btn btn-primary btn-lg' data-toggle='modal'>X</button></td>
                                        </form>
                                      </tr>";
                            }
                            try {
                              if (isset($_POST['productDeleteRecord'])) {
                                  $productD = $_POST['productID'];
                                  $productDeleteRecordQ = "DELETE FROM `product` WHERE productID = :productDID";
                                  $productDelstmt = $db -> prepare($productDeleteRecordQ);
                                  $productDelstmt -> bindparam(':productDID',$productD);
                                  $productDelstmt->execute();
                                  echo "<script>location.href='index.php?page=DCrud';</script>";
                                }
                              } catch (PDOException $e) {
                                  echo $e->getMessage();
                              }
                            try {
                              if (isset($_POST['disabled'])) {
                                $enabled = $_POST['productID'];
                                $disableQ = "UPDATE `product` SET `productAddStatus` = '0' WHERE `product`.`productID` = :ID";
                                $disablestmt = $db -> prepare($disableQ);
                                $disablestmt -> bindparam(':ID',$enabled);
                                $disablestmt->execute();
                                echo "<script>location.href='Index.php?page=DCrud';</script>";
                              }
                            } catch (PDOException $e) {
                                echo $e->getMessage();
                            }

                            try {
                              if (isset($_POST['enabled'])) {
                                $disabled = $_POST['productID'];
                                $enableQ = "UPDATE `product` SET `productAddStatus` = '1' WHERE `product`.`productID` = :id";
                                $enablestmt = $db -> prepare($enableQ);
                                $enablestmt -> bindparam(':id',$disabled);
                                $enablestmt->execute();
                                echo "<script>location.href='Index.php?page=DCrud';</script>";
                              }
                            } catch (PDOException $e) {
                                echo $e->getMessage();
                            }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div id='tabs-2' title='Voorraad'>
                    <table id="voorraadTable" class="table table-striped">
                      <tbody>
                        <th colspan="8">Voorraad</th>
                        <tr>
                          <td colspan="8"><strong>Voeg voorraad toe</strong></td>
                        </tr>
                        <tr>
                          <td><strong>Locatie</strong></td>
                          <td><strong>Product</strong></td>
                          <td><strong>Type</strong></td>
                          <td><strong>Fabriek</strong></td>
                          <td><strong>Aantal</strong></td>
                          <td><strong>Inkoopprijs</strong></td>
                          <td><strong>Verkoopprijs</strong></td>
                        </tr>
                        <?php
                            echo "<form method='post' action='' onsubmit='' id='formulier' enctype='multipart/form-data'>
                                    <tr>
                                      <td><input type='text' name='voorraadLocatie'></td>
                                      <td><input type='text' name='voorraadProduct'></td>
                                      <td><input type='text' name='voorraadType'></td>
                                      <td><input type='text' name='voorraadFabriek'></td>
                                      <td><input type='text' name='voorraadAantal'></td>
                                      <td><input type='text' name='voorraadInkoop'></td>
                                      <td><input type='text' name='voorraadVerkoop'></td>
                                      <td><button type='submit' name='voorraadAddRecord' value='true' class='btn btn-primary btn-lg' data-toggle='modal'>Voeg toe</button></td>
                                    </tr>
                                  </form>";
                        ?>
                        <th colspan="8">Overzicht</th>
                        <tr>
                          <td><strong>Locatie</strong></td>
                          <td><strong>Product</strong></td>
                          <td><strong>Type</strong></td>
                          <td><strong>Fabriek</strong></td>
                          <td><strong>Aantal</strong></td>
                          <td><strong>Inkoopprijs</strong></td>
                          <td><strong>Verkoopprijs</strong></td>
                        </tr>
                          <?php
                          $voorraadQ = "SELECT * FROM voorraad INNER JOIN locatie INNER JOIN fabriek INNER JOIN product on voorraad.locatieID = locatie.locatieID AND voorraad.productID = product.productID AND product.fabriekID = fabriek.fabriekID";
                          $voorraadstmt = $db -> prepare($voorraadQ);
                          $voorraadstmt->execute();
                          // $locationCounter = 0;
                          while ($voorraadRow = $voorraadstmt->fetch(PDO::FETCH_ASSOC)) {
                            $vID = $voorraadRow['voorraadID'];
                            $vLocatie = $voorraadRow['locatie'];
                            $vProductnaam = $voorraadRow['productnaam'];
                            $vType = $voorraadRow['type'];
                            $vFabriek = $voorraadRow['fabrieknaam'];
                            $vAantal = $voorraadRow['aantal'];
                            $vInkoopprijs = $voorraadRow['inkoopprijs'];
                            $vVerkoopprijs = $voorraadRow['verkoopprijs'];
                            echo "<tr>
                                    <form method='post' action='' onsubmit='' id='formulier' enctype='multipart/form-data'>
                                      <td><input type='text' placeholder='" . $vLocatie ."' value='" . $vLocatie ."'></td>
                                      <td><input type='text' placeholder='" . $vProductnaam ."' value='" . $vProductnaam ."'></td>
                                      <td><input type='text' placeholder='" . $vType ."' value='" . $vType ."'></td>
                                      <td><input type='text' placeholder='" . $vFabriek ."' value='" . $vFabriek ."'></td>
                                      <td><input type='text' placeholder='" . $vAantal ."' value='" . $vAantal ."'></td>
                                      <td><input type='text' placeholder='&euro; " . $vInkoopprijs ."' value='" . $vInkoopprijs ."'></td>
                                      <td><input type='text' placeholder='&euro; " . $vVerkoopprijs ."' value='" . $vVerkoopprijs ."'><input type='hidden' name='voorraadID' value='" . $voorraadRow['voorraadID'] . "'></td>
                                      <td><button type='submit' name='voorraadUpdateRecord' value='true'  class='btn btn-primary btn-lg' data-toggle='modal'>Update</button></td>
                                      ";
                            if ($vAantal == 0) {
                              echo "<td><button type='submit' name='voorraadDeleteRecord' value='true'  class='btn btn-primary btn-lg' data-toggle='modal'>X</button></td>";
                            }
                            echo "  </form>
                                  </tr>";
                          }
                          try {
                              if (isset($_POST['voorraadUpdateRecord'])) {
                                // $upVoorraadID = $_POST['voorraadID'];
                                // $upVoorraadL = $_POST['voorraadID'];
                                // $upVoorraadT = $_POST['voorraadID'];
                                // $upVoorraadA = $_POST['voorraadID'];
                                // $upVoorraadIn = $_POST['voorraadID'];
                                // $upVoorraadVer = $_POST['voorraadID'];
                                // $upVoorraadQ = "";
                                // $upVoorraadstmt = $db -> prepare($upVoorraadQ);
                                // $upVoorraadstmt -> bindparam(':delVID',$upVoorraad);
                                //
                                // $upVoorraadstmt->execute();
                                // echo "<script>location.href='Index.php?page=DCrud';</script>";
                              }
                            } catch (PDOException $e) {
                                echo $e->getMessage();
                            }
                          try {
                              if (isset($_POST['voorraadDeleteRecord'])) {
                                $delVoorraad = $_POST['voorraadID'];
                                $delVoorraadQ = "DELETE FROM `voorraad` WHERE `voorraad`.`voorraadID` = :delVID";
                                $delVoorraadstmt = $db -> prepare($delVoorraadQ);
                                $delVoorraadstmt -> bindparam(':delVID',$delVoorraad);
                                $delVoorraadstmt->execute();
                                echo "<script>location.href='Index.php?page=DCrud';</script>";
                              }
                            } catch (PDOException $e) {
                                echo $e->getMessage();
                            }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div id='tabs-3' title='Medewerker'>
                    <table id="medewerkerTable" class="table table-striped">
                      <tbody>
                        <th colspan="9">Medewerker</th>
                        <tr>
                          <td colspan="9"><strong>Voeg Medewerker toe</strong></td>
                          <tr>
                            <td><strong>Gebruikersnaam</strong></td>
                            <td><strong>Wachtwoord</strong></td>
                            <td><strong>Voorletters</strong></td>
                            <td><strong>Tussenvoegsel</strong></td>
                            <td><strong>Achternaam</strong></td>
                            <td><strong>Telefoon</strong></td>
                            <td><strong>Emailadres</strong></td>
                            <td></td>
                          </tr>
                        </tr>
                        <?php
                            echo "<form method='post' action='' onsubmit='' id='formulier' enctype='multipart/form-data'>
                                    <tr>
                                      <td><input type='text' name='medewerkerNaam'></td>
                                      <td><input type='text' name='medewerkerWachtwoord'></td>
                                      <td><input type='text' name='medewerkerVoorletters'></td>
                                      <td><input type='text' name='medewerkerTussenvoegsel'></td>
                                      <td><input type='text' name='medewerkerAchternaam'></td>
                                      <td><input type='text' name='medewerkerTelefoon'></td>
                                      <td>
                                        <input type='text' name='medewerkerEmail'>
                                        <input type='hidden' value='medewerker' name='medewerkerRol'>
                                      </td>
                                      <td><button type='submit' name='medewerkerAddRecord' value='true' class='btn btn-primary btn-lg' data-toggle='modal'>Voeg toe</button></td>
                                    </tr>
                                  </form>";
                        ?>
                        <td colspan="9"><strong>Overzicht</strong></td>
                        <tr>
                          <td><strong>Gebruikersnaam</strong></td>
                          <td><strong>Wachtwoord</strong></td>
                          <td><strong>Voorletters</strong></td>
                          <td><strong>Tussenvoegsel</strong></td>
                          <td><strong>Achternaam</strong></td>
                          <td><strong>Telefoon</strong></td>
                          <td><strong>Emailadres</strong></td>
                          <td></td>
                        </tr>
                        <?php
                        $gebruikerQ = "SELECT * FROM gebruikers";
                        $stmt = $db -> prepare($gebruikerQ);
                        $users = array();
                        $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $gID = $row['gebruikerID'];
                                $gNaam = $row['gebruikersnaam'];
                                $gWachtwoord = $row['wachtwoord'];
                                $gVoorletters = $row['voorletters'];
                                $gTussenvoegsel = $row['tussenvoegsel'];
                                $gAchternaam = $row['achternaam'];
                                $gTelefoon = $row['telefoon'];
                                $gEmail = $row['emailadres'];
                                echo "<tr>
                                        <form method='post' action='' onsubmit='' id='formulier' enctype='multipart/form-data'>
                                        <td><input type='text' placeholder='" . $gNaam . "' value='" . $gNaam . "'></td>
                                        <td><input type='text' placeholder='" . $gWachtwoord . "' value='" . $gWachtwoord . "'></td>
                                        <td><input type='text' placeholder='" . $gVoorletters . "' value='" . $gVoorletters . "'></td>
                                        <td><input type='text' placeholder='" . $gTussenvoegsel . "' value='" . $gTussenvoegsel . "'></td>
                                        <td><input type='text' placeholder='" . $gAchternaam . "' value='" . $gAchternaam . "'></td>
                                        <td><input type='text' placeholder='" . $gTelefoon . "' value='" . $gTelefoon . "'></td>
                                        <td><input type='text' placeholder='" . $gEmail . "' value='" . $gEmail . "'><input type='hidden' value='" . $gID . "'></td>
                                        <td><button type='submit' name='medewerkerUpdateRecord' value='true'  class='btn btn-primary btn-lg' data-toggle='modal'>Update</button></td>
                                        <td><button type='submit' name='medewerkerDeleteRecord' value='true'  class='btn btn-primary btn-lg' data-toggle='modal'>X</button></td>
                                        </form>
                                      </tr>";
                            }
                        ?>
                      </tbody>
                    </table>
                  </div>
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
