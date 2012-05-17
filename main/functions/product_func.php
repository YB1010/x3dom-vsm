<?php
	session_start();
	require_once("config.php");

    /**
     ==================================================================================================================
     File name: product_func.php
     Benefit: This file collected a functions for manage product database.
     Developer: Chawinrot Niwateak.
     ==================================================================================================================
     */
    
    function insertProduct($product_id, $product_name, $product_text, $product_type_id, $product_price, $product_image, $product_3dfile)
    {
        if (!isset($product_id)
            || !isset($product_name)
            || !isset($product_text)
            || !isset($product_type_id)
            || !isset($product_price)
            || !is_numeric($product_price)) {
            return false;
        } else {
            $product_id = mysql_real_escape_string($product_id);
            $product_name = mysql_real_escape_string($product_name);
            $product_text = mysql_real_escape_string($product_text);
            
            if (isset($product_image) && $product_image["name"] != "") {
                $image = md5("ProductImage" . $product_image["name"] . date("r")) . ".jpg";
                copy($product_image["tmp_name"], "../image_uploads/" . $image);
            }
            if (isset($product_3dfile) && $product_3dfile["name"] != "") {
                $file3d = md5("Product3DFile" . $product_3dfile["name"] . date("r")) . ".html";
                copy($product_3dfile["tmp_name"], "../3d_uploads/" . $file3d);
            }
            $query = "INSERT INTO Product (ProductID, ProductName, ProductText, ProductTypeID, ProductPrice, ProductImage, Product3DFile) ";
            $query .= "VALUES ('" . $product_id . "', '" . $product_name . "', '" . $product_text . "', " . $product_type_id . ", " . $product_price . ", '" . $image . "', '" . $file3d . "')";
            
            return mysql_query($query);
        }
    }
    
    function updateProduct($product_id, $product_name, $product_text, $product_type_id, $product_price, $old_product_image, $product_image, $old_product_3dfile, $product_3dfile)
    {
        if (!isset($product_id)
            || !isset($product_name)
            || !isset($product_text)
            || !isset($product_type_id)
            || !isset($product_price)
            || !is_numeric($product_price)) {
            return false;
        } else {
            $product_id = mysql_real_escape_string($product_id);
            $product_name = mysql_real_escape_string($product_name);
            $product_text = mysql_real_escape_string($product_text);
            $old_product_image = mysql_real_escape_string($old_product_image);
            $old_product_3dfile = mysql_real_escape_string($old_product_3dfile);
            
            $query = "UPDATE Product SET ProductName = '" . $product_name . "', ProductText = '" . $product_text . "', ProductTypeID = " . $product_type_id . ", ProductPrice = " . $product_price . " ";
			
            if (isset($product_image) && $product_image["name"] != "") {
                if (isset($old_product_image))
                    unlike("../image_uploads/" . $old_product_image);
                $image = md5("ProductImage" . $product_image["name"] . date("r")) . ".jpg";
                copy($product_image["tmp_name"], "../image_uploads/" . $image);
                $query .= ", ProductImage = '" . $image . "' ";
            }
			
            if (isset($product_3dfile) && $product_3dfile["name"] != "") {
                if (isset($old_product_3dfile))
                    unlike("../3d_uploads/" . $old_product_3dfile);
                $file3d = md5("Product3DFile" . $product_3dfile["name"] . date("r")) . ".html";
                copy($product_3dfile["tmp_name"], "../3d_uploads/" . $file3d);
                $query .= ", Product3DFile = '" . $file3d . "' ";
            }
            $query .= "WHERE ProductID = '" . $product_id . "'";
			
            return mysql_query($query);
        }
    }
    
    function deleteProduct($product_id, $product_image, $product_3dfile)
    {
        if (isset($product_id)) {
            $product_id = mysql_real_escape_string($product_id);
            $product_image = mysql_real_escape_string($product_image);
            $product_3dfile = mysql_real_escape_string($product_3dfile);
            if (isset($product_image) && $product_image != "")
                unlike( "../image_uploads/" . $product_image);
            if (isset($product_3dfile) && $product_3dfile != "")
                unlike( "../3d_uploads/" . $product_3dfile);
            $query = "DELETE FROM Product WHERE ProductID = '" . $product_id . "'";
            
            return mysql_query($query);
        }
    }
    
    if (isset($_REQUEST["func"])) {
        switch ($_REQUEST["func"]) {
            case "insert" :
                $ProductID = md5($_REQUEST["ProductName"] . date("Ymdhis"));
                $ProductName = $_REQUEST["ProductName"];
				$ProductText = $_REQUEST["ProductText"];
                $ProductTypeID = $_REQUEST["ProductTypeID"];
                $ProductPrice = $_REQUEST["ProductPrice"];
                $result = insertProduct($ProductID, $ProductName, $ProductText, $ProductTypeID, $ProductPrice, $_FILES["ProductImage"], $_FILES["Product3DFile"]);
                break;
            case "update" :
                $ProductID = $_REQUEST["ProductID"];
                $ProductName = $_REQUEST["ProductName"];
				$ProductText = $_REQUEST["ProductText"];
                $ProductTypeID = $_REQUEST["ProductTypeID"];
                $ProductPrice = $_REQUEST["ProductPrice"];
                $OldProductImage = $_REQUEST["OldProductImage"];
                $OldProduct3DFile = $_REQUEST["OldProduct3DFile"];
                $result = updateProduct($ProductID, $ProductName, $ProductText, $ProductTypeID, $ProductPrice, $OldProductImage, $_FILES["ProductImage"], $OldProduct3DFile, $_FILES["Product3DFile"]);
                break;
            case "delete" :
                $ProductID = $_REQUEST["ProductID"];
                $ProductImage = $_REQUEST["ProductImage"];
                $Product3DFile = $_REQUEST["Product3DFile"];
                $result = deleteProduct($ProductID, $ProductImage, $Product3DFile);
                break;
            default:
                $result = false;
                break;
        }
        
        if ($result) {
?>

<script type="text/javascript">
    <!--
    alert("<?php echo $_REQUEST["func"]; ?> success.");
    window.location = "<?php echo $_REQUEST["url"]; ?>";
    //-->
</script>

<?php
    } else {
?>

<script type="text/javascript">
    <!--
    alert("<?php echo $_REQUEST["func"]; ?> fail.");
    window.location = "<?php echo $_REQUEST["url"]; ?>";
    //-->
</script>

<?php
        }
    }
?>