<?php
    if ($_SESSION['L_ADMINID'] == "Directie" && $_SESSION['L_STATUS'] === 2) {
          $medewerkerDeleteRecordQ = "DELETE FROM gebruiker WHERE gebruiker.gebruikerID = :gebruikerID";
          $medewerkerDelstmt = $db -> prepare($medewerkerDeleteRecordQ);
          $medewerkerDelstmt -> bindparam(':gebruikerID',$_SESSION['deleteMedewerkerID']);
          $medewerkerDelstmt->execute();
          $_SESSION['deleteMedewerkerID'] = "";
          echo "<script>location.href='index.php?page=DCrud';</script>";
    }

?>
