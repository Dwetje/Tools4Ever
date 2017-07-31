
<?php
    if ($_SESSION['L_ADMINID'] == "Directie" && $_SESSION['L_STATUS'] === 2) {

          $productUpdateRecordQ = "UPDATE product SET productnaam = :productnaam, type = :type, inkoopprijs = :inkoopprijs, verkoopprijs = :verkoopprijs WHERE product.productID = :addproductID";
          $productUpdatestmt = $db -> prepare($productUpdateRecordQ);
          $productUpdatestmt -> bindparam(':addproductID',$_SESSION['updateProductID']);
          $productUpdatestmt -> bindparam(':productnaam',$_SESSION['updateProductNaam']);
          $productUpdatestmt -> bindparam(':type',$_SESSION['updateProductType']);
          $productUpdatestmt -> bindparam(':inkoopprijs',$_SESSION['updateProductInkoopprijs']);
          $productUpdatestmt -> bindparam(':verkoopprijs',$_SESSION['updateProductVerkoopprijs']);
          $productUpdatestmt->execute();
          $_SESSION['updateProductID'] = "";
          $_SESSION['updateProductNaam'] = "";
          $_SESSION['updateProductType'] = "";
          $_SESSION['updateProductInkoopprijs'] = "";
          $_SESSION['updateProductVerkoopprijs'] = "";

          echo "<script>location.href='index.php?page=DCrud';</script>";
    }

?>
