<?php
    session_start();
    require_once "config.php";
    /*
     ==================================================================================================================
     File name: order_func.php
     Benefit: This file collected a functions for manage order database.
     Developer: Chawinrot Niwateak.
     ==================================================================================================================
     */
    
    function insertOrder($order_id, $account_id, $product_id)
    {
        $order_id = mysql_real_escape_string($order_id);
        $account_id = mysql_real_escape_string($account_id);
        $product_id = mysql_real_escape_string($product_id);
        
        $query = "INSERT INTO `Order` (OrderID, AccountID, ProductID) ";
        $query .= "VALUES ('" . $order_id . "', '" . $account_id . "', '" . $product_id . "')";
        
        return mysql_query($query);
    }
    
    function updateOrderStatus($order_id, $order_status)
    {
        $order_id = mysql_real_escape_string($order_id);
        $order_status = mysql_real_escape_string($order_status);
        
        $query = "UPDATE `Order` SET OrderStatusID = '" . $order_status . "' WHERE OrderID = '" . $order_id ."'";

        return mysql_query($query);
    }
    
    function deleteOrder($account_id, $order_id)
    {
        $account_id = mysql_real_escape_string($account_id);
        $order_id = mysql_real_escape_string($order_id);
        
        $query = "DELETE FROM `Order` WHERE AccountID = '" . $account_id . "' AND OrderID = '" . $order_id . "'";

        return mysql_query($query);
    }
    
    function selectOrder($account_id, $order_status)
    {
        $account_id = mysql_real_escape_string($account_id);
        $order_status = mysql_real_escape_string($order_status);
        
        $query = "SELECT acc.AccountID, acc.AccountName, acc.AccountEmail, COUNT(ord.OrderID) AS amount ";
        $query .= "FROM Account AS acc LEFT OUTER JOIN `Order` AS ord ON acc.AccountID = ord.AccountID ";
        $query .= "WHERE acc.AccountId LIKE '%" . $account_id . "%' ";
        $query .= "AND (ord.OrderStatusID LIKE '%" . $order_status . "%' OR ord.OrderStatusID IS NULL) ";
        $query .= "GROUP BY acc.AccountID ORDER BY acc.AccountName";
        
        return mysql_query($query);
    }
    
    function selectOrderDetail($account_id, $order_status)
    {
        $account_id = mysql_real_escape_string($account_id);
        $order_status = mysql_real_escape_string($order_status);
        
        $query = "SELECT ord.OrderID, ord.OrderStatusID, pro.ProductID, ";
        $query .= "pro.ProductName, pro.ProductText, pro.ProductPrice, pro.ProductImage, pro.Product3DFile, sta.OrderStatusName ";
        $query .= "FROM `Order` AS ord JOIN Product AS pro ON ord.ProductID = pro.ProductID ";
        $query .= "JOIN OrderStatus AS sta ON ord.OrderStatusID = sta.OrderStatusID ";
        $query .= "WHERE ord.AccountID = '" . $account_id . "' AND ord.OrderStatusID LIKE '%" . $order_status . "%' ";
        $query .= "ORDER BY pro.ProductName";
        
        return mysql_query($query);
    }
    
    if (isset($_REQUEST["func"])) {
        switch ($_REQUEST["func"]) {
            case "insert" :
                $OrderID = md5($_SESSION["AccountID"] . $_REQUEST["ProductID"] . date("Ymdhis"));
                $AccountID = $_SESSION["AccountID"];
                $ProductID = $_REQUEST["ProductID"];
                $result = insertOrder($OrderID, $AccountID, $ProdcutID);
                break;
            case "update" :
                $OrderID = $_REQUEST["OrderID"];
                $OrderStatusID = $_REQUEST["OrderStatusID"];
                $result = updateOrderStatus($OrderID, $OrderStatusID);
                break;
            case "delete" :
                $AccountID = $_SESSION["AccountID"];
                $OrderID = $_REQUEST["OrderID"];
                $result = deleteOrder($AccountID, $OrderID);
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