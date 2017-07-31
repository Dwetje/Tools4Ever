
<?php
    if ($_SESSION['L_ADMINID'] == "Directie" && $_SESSION['L_STATUS'] === 2) {

          //voorraad muteren
          echo "<script>location.href='index.php?page=DCrud';</script>";
    }

?>
