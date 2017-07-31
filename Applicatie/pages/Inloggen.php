<?php
if (isset($_POST['submit'])) {
  $error = "";
  $username = $_POST['Username']; // In deze variables worden de verstuurde waardes opgeslagen.
  $password = $_POST['Password'];
  // WIP
  $passwordHash = hash("sha256", $password);
  //
  if (strlen($error)<1) {
    try {
      $inlogQuery = "SELECT * FROM gebruikers WHERE gebruikersnaam = :Username AND wachtwoord = :Password"; // Deze query dient voor het controleren van de inlog gegevens.
      $stmt = $db -> prepare($inlogQuery);
      $stmt -> bindparam(':Username',$username);
      $stmt -> bindparam(':Password',$passwordHash);
      $stmt -> execute();
      $rows = $stmt -> fetch();
      $result = $rows > 0 ? true : false;
      $directie = $rows["rol"] == "Directie" ? true : false;
      // if () {
      //   # code...
      // }
        if($result){
          if($directie){
            $_SESSION['L_ADMINID'] = $rows['rol'];
            $_SESSION['L_NAME'] = $rows['gebruikersnaam'];
            $_SESSION['L_STATUS'] = 2;
            echo "<script>location.href='index.php?page=Directie';</script>";
          }else {
            $_SESSION['L_ADMINID'] = $rows['rol'];
            $_SESSION['L_NAME'] = $rows['gebruikersnaam'];
            $_SESSION['L_STATUS'] = 1;
            echo "<script>location.href='Index.php?page=Medewerker';</script>";
          }
        }else {
          $error .= "Gegevens zijn niet bij ons bekend! Probeer nogmaals.";
          echo "<script type='text/javascript'>alert('" . $error . "');</script>";

        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
  }
}
?>
<html>
<head>
  <title>Tools4Ever</title>
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
  <script type="text/javascript">
    function confirmLogin(){
        location.href='index.php?page=Inloggen';
    }
    function confirmHome(){
        location.href='index.php?page=Home';
    }
    function confirmContact(){
        location.href='index.php?page=Contact';
    }
  </script>
</head>
<body id="index">
  <div class="content-wrapper">
    <div class="header">
      <div class="col-md-12">
        <div class="col-md-10">
          <div class="logo" onclick="confirmHome()">
            <h1>ToolsForEver</h1>
          </div>
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
        <div class="login-module">
          <div id="h1">
            <h1>ToolsForEver</h1>
            <br />
            <p>Voer hier uw inlog gegevens in om in het systeem te komen.</p>
            <br />
          </div>
          <form id="login-form" method="post" action="" onsubmit="">
            <div class="form-group">
              <label >Gebruikersnaam</label><br />
              <input type="text" name="Username" value="" placeholder="Naam" required/>
            </div>
            <div class="form-group">
              <label>Wachtwoord</label><br />
              <input type="password" name="Password" value="" placeholder="********" required/>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" value="true" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Inloggen</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
