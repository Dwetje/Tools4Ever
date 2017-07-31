<?php
    if ($_SESSION['L_ADMINID'] == "Directie" && $_SESSION['L_STATUS'] === 2) {
          $productDeleteRecordQ = "DELETE FROM `product` WHERE productID = :productID";
          $productDelstmt = $db -> prepare($productDeleteRecordQ);
          $productDelstmt -> bindparam(':productID',$_SESSION['deleteproductID']);
          $productDelstmt->execute();
          $_SESSION['deleteproductID'] = "";
          echo "<script>location.href='index.php?page=DCrud';</script>";
    }
?>
