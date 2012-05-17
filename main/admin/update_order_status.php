<?php
    session_start();
    require_once "../functions/order_func.php";
    require_once "../functions/config.php";
    
    if (updateOrderStatus($_REQUEST["OrderID"], $_REQUEST["OrderStatusID"])) {
?>
<script type="text/javascript">
    <!--
    alert("");
    window.location = "index.php"
    //-->
    </script>
<?php
    } else {
    ?>

<script type="text/javascript">
    <!--
    alert("");
    window.location = "index.php"
    //-->
    </script>

<?php
    }
    ?>
