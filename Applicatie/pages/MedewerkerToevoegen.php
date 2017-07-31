<?php
          $hash = hash("sha256", $password);
          $rol = "Medewerker";
          $medewerkerAddRecordQ = "INSERT INTO gebruikers ( gebruikersnaam, rol, wachtwoord, voorletters, tussenvoegsel, achternaam, telefoon, emailadres) VALUES ( :naam, :r, :ww, :v, :t, :a, :tel, :e)";
          $medewerkerAddstmt = $db -> prepare($medewerkerAddRecordQ);
          $medewerkerAddstmt -> bindparam(':naam',$_POST['medewerkerNaam']);
          $medewerkerAddstmt -> bindparam(':r', $rol);
          $medewerkerAddstmt -> bindparam(':ww',$hash);
          $medewerkerAddstmt -> bindparam(':v',$_POST['medewerkerVoorletters']);
          $medewerkerAddstmt -> bindparam(':t',$_POST['medewerkerTussenvoegsel']);
          $medewerkerAddstmt -> bindparam(':a',$_POST['medewerkerAchternaam']);
          $medewerkerAddstmt -> bindparam(':tel',$_POST['medewerkerTelefoon']);
          $medewerkerAddstmt -> bindparam(':e',$_POST['medewerkerEmail']);
          $medewerkerAddstmt->execute();
          echo "<script>location.href='index.php?page=DCrud';</script>";
?>
