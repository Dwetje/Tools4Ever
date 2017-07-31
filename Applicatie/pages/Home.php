<html>
  <head>
    <title>ToolsForEver</title>
    <link rel="stylesheet" type="text/css" href="css/Style.css"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript">
      function confirmLogin(){
          location.href='index.php?page=Inloggen'; // Deze functies dienen voor verwijzen naar de andere pagina's
      }
      function confirmHome(){
          location.href='index.php?page=Home';
      }
      function confirmContact(){
          location.href='index.php?page=Contact';
      }
    </script>
  </head>
  <body class="index">
    <div class="content-wrapper">
        <div class="header">
          <div class="col-md-12">
            <div class="col-md-10">
              <div class="logo" onclick="confirmHome()"><h1>ToolsForEver</h1></div>
            </div>
            <div class="col-md-1">
              <div class="login">
                <button type="button" class="btn btn-default" onclick="confirmLogin()">Login</button>
              </div>
            </div>
            <div class="col-md-1">
              <div class="contact">
                <button type="button" class="btn btn-default" onclick="confirmContact()">Contact</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="locationBalk">
              <div class="col-md-3">
                <div class="locatieItem"></div>
              </div>
              <div class="col-md-3">
                <div class="locatieItem"></div>
              </div>
              <div class="col-md-3">
                <div class="locatieItem"></div>
              </div>
              <div class="col-md-3">
                <div class="locatieItem"></div>
              </div>
            </div>
            <div class="info">
              <div class="col-md-6">
                <iframe src='https://www.youtube.com/embed/tntOCGkgt98?autoplay=1' class="video" alt='No'></iframe>
              </div>
              <div class="col-md-6">
                <div class="add">
                </div>
              </div>
            </div>
            <div class="reclame">
              <table>
                <tbody>
                  <?php
                    $getProductQ = "SELECT * FROM product";
                    $getProductstmt = $db -> prepare($getProductQ);
                    $getProductstmt->execute();
                    $getProductRow = $getProductstmt->fetchAll(PDO::FETCH_ASSOC);
                    echo "<tr>";
                    foreach ($getProductRow as $getProductkey => $getProductvalue) {
                      if ($getProductvalue['productAddStatus'] == 1) {
                        echo "<td>
                          <div class='card' style='width: 20rem;'>
                            <img class='card-img-top' src='images/" . $getProductvalue['productAfbeelding'] . "' alt='Card image cap'>
                            <div class='card-block'>
                              <h4 class='card-title'>Card title</h4>
                              <p class='card-text'>" . $getProductvalue['productBeschrijving'] . "</p>
                              <p><strong>Nu voor: " . $getProductvalue['verkoopprijs'] . "</strong></p>
                            </div>
                          </div>
                          <td>";
                      }
                    }
                    echo "</tr>";
                  ?>
                  <!-- <img src="images/makita.png"> -->
                </tbody>

              </table>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
