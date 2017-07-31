<?php
    if ($_SESSION['L_ADMINID'] == "Directie" && $_SESSION['L_STATUS'] === 2) {
          $updateMedewerkerQ = "UPDATE `gebruikers` SET `gebruikersnaam` = :updateMedewerkerNaam, `wachtwoord` = :updateMedewerkerWW, `voorletters` = :updateMedewerkerV, `tussenvoegsel` = :updateMedewerkerT, `achternaam` = :updateMedewerkerA, `telefoon` = :updateMedewerkerTel, emailadres = :updateMedewerkerE WHERE `gebruikers`.`gebruikerID` = :updateMedewerkerID";
          $medewerkerUpdatestmt = $db -> prepare($updateMedewerkerQ);
          $medewerkerUpdatestmt -> bindparam(':updateMedewerkerNaam',$_SESSION['updateMedewerkerNaam']);
          $medewerkerUpdatestmt -> bindparam(':updateMedewerkerWW',$_SESSION['updateMedewerkerWW']);
          $medewerkerUpdatestmt -> bindparam(':updateMedewerkerV',$_SESSION['updateMedewerkerV']);
          $medewerkerUpdatestmt -> bindparam(':updateMedewerkerT',$_SESSION['updateMedewerkerT']);
          $medewerkerUpdatestmt -> bindparam(':updateMedewerkerA',$_SESSION['updateMedewerkerA']);
          $medewerkerUpdatestmt -> bindparam(':updateMedewerkerTel',$_SESSION['updateMedewerkerTel']);
          $medewerkerUpdatestmt -> bindparam(':updateMedewerkerE',$_SESSION['updateMedewerkerE']);
          $medewerkerUpdatestmt -> bindparam(':updateMedewerkerID',$_SESSION['updateMedewerkerID']);
          $medewerkerUpdatestmt -> execute();

          $_SESSION['updateMedewerkerID'] = "";
          $_SESSION['updateMedewerkerNaam'] = "";
          $_SESSION['updateMedewerkerWW'] = "";
          $_SESSION['updateMedewerkerV'] = "";
          $_SESSION['updateMedewerkerT'] = "";
          $_SESSION['updateMedewerkerA'] = "";
          $_SESSION['updateMedewerkerTel'] = "";
          $_SESSION['updateMedewerkerE'] = "";
          echo "<script>location.href='index.php?page=DCrud';</script>";
    }
?>
