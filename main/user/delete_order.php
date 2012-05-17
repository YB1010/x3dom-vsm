<?php
    session_start();
    require_once "../functions/order_func.php";
    require_once "../functions/config.php";
    
    if (deleteOrder($_SESSION["AccountID"], $_REQUEST["OrderID"])) {
?>
<script type="text/javascript">
    <!--
    alert("");
    window.location = "../index.php"
    //-->
</script>
<?php
    } else {
?>
<script type="text/javascript">
    <!--
    alert("");
    window.location = "../index.php"
    //-->
    </script>
<?php
    }
?>
