<?php

          $productAddRecordQ = "INSERT INTO product (productnaam, type, fabriekID, inkoopprijs, verkoopprijs) VALUES ( :productnaam, :type, :fabriekID, :inkoopprijs, :verkoopprijs)";
          $productAddstmt = $db -> prepare($productAddRecordQ);
          $productAddstmt -> bindparam(':productnaam',$_POST['productNaam']);
          $productAddstmt -> bindparam(':type',$_POST['productType']);
          $productAddstmt -> bindparam(':fabriekID',$_POST['productFabriek']);
          $productAddstmt -> bindparam(':inkoopprijs',$_POST['productInkoop']);
          $productAddstmt -> bindparam(':verkoopprijs',$_POST['productVerkoop']);
          $productAddstmt->execute();
          echo "<script>location.href='index.php?page=DCrud';</script>";
?>
