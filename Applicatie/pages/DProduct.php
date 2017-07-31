<?php
    if ($_SESSION['L_ADMINID'] == "Directie" && $_SESSION['L_STATUS'] === 2) {
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
                <td class="main_nav_button active">
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
          <div class="zoekProduct">
            <form id="product-form" method="post" action="" onsubmit="">
              <div class="form-group">
                <label >****</label><br />
                <input type="text" name="" value="" placeholder="****" required/>
              </div>
              <div class="form-group">
                <label>****</label><br />
                <input type="text" name="" value="" placeholder="********" required/>
              </div>
              <div class="form-group">
                <button type="submit" name="productZoeken" value="true" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Zoek product</button>
              </div>
            </form>
          </div>
          <?php
            // zoekresultaten
            echo "<div class='zoekResultaat'>

            </div>";
          ?>
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
