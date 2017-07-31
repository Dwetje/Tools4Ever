<?php
    if ($_SESSION['L_ADMINID'] == "Directie" && $_SESSION['L_STATUS'] === 2) {

          $voorraadAddRecordQ = "";
          $voorraadAddstmt = $db -> prepare($voorraadAddRecordQ);
          $voorraadAddstmt -> bindparam(':voorraadnaam',$_SESSION['addVoorraadNaam']);
          $voorraadAddstmt -> bindparam(':voorraadProduct',$_SESSION['addVoorraadProduct']);
          $voorraadAddstmt -> bindparam(':voorraadType',$_SESSION['addVoorraadType']);
          $voorraadAddstmt -> bindparam(':voorraadFabriek',$_SESSION['addVoorraadFabriek']);
          $voorraadAddstmt -> bindparam(':voorraadAantal',$_SESSION['addVoorraadAantal']);
          $voorraadAddstmt -> bindparam(':voorraadInkoopprijs',$_SESSION['addVoorraadInkoop']);
          $voorraadAddstmt -> bindparam(':voorraadVerkoopprijs',$_SESSION['addVoorraadVerkoop']);
          $voorraadAddstmt->execute();

          $_SESSION['addVoorraadNaam'] = "";
          $_SESSION['addVoorraadProduct'] = "";
          $_SESSION['addVoorraadType'] = "";
          $_SESSION['addVoorraadFabriek'] = "";
          $_SESSION['addVoorraadAantal'] = "";
          $_SESSION['addVoorraadInkoop'] = "";
          $_SESSION['addVoorraadVerkoop'] = "";
          echo "<script>location.href='index.php?page=DCrud';</script>";
    }

?>
