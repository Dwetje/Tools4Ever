<?php
    if ($_SESSION['L_ADMINID'] == "Directie" && $_SESSION['L_STATUS'] === 2) {
          //voorraad verwijderen
          echo "<script>location.href='index.php?page=DCrud';</script>";
    }

?>
