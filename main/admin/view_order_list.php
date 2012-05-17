<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<meta name="description" content="OTOP3D" />
		<meta name="keywords" content="OTOP3D"/>
		<meta itemprop="description" content="OTOP3D" />
        
		<title>OTOP3D Project</title>
		<link rel="shortcut icon" href="../styles/favicon/favicon.ico" type="image/x-icon"/>
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link type="text/css" rel="stylesheet" href="../styles/reset.css" />
		<link type="text/css" rel="stylesheet" href="../styles/text.css" />
		<link type="text/css" rel="stylesheet" href="../styles/styles.css" />
		
		<script type="text/javascript" src="../scripts/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="../scripts/jquery.easing.1.3.js"></script>
  	</head>
  	<body>
		<article id="container">
			<nav>
				<ul>
					<li><a href="index.php"><div class="navcircle"><span class="navbar">Home</span></div></a></li>
                    <li><a href="view_order.php"><div class="navcircle"><span class="navbar">Order</span></div></a></li>
					<li><a href="../functions/logout_func.php"><div class="navcircle"><span class="navbar">Logout</span></div></a></li>
				</ul>
			</nav>
            
			<header>
				<h1>OTOP3D</h1>
			</header>
			
			<section>
				
				<div class="catnameline">
					<span class="textincat">
				
                <?php
                    require_once "../functions/order_func.php";
                    require_once "../functions/config.php";
                    
                    $query = "SELECT OrderStatusID, OrderStatusName FROM OrderStatus ORDER BY OrderStatusName";
                    $result = mysql_query($query);
                    
                    echo "<a href=\"view_order_list.php?AccountID=" . $_REQUEST["AccountID"] . "\">Show all orders</a> |";
                    $i = 0;
                    $OrderStatusID = array(); $OrderStatusName = array();
                    while ($rows = mysql_fetch_array($result)) {
                        $OrderStatusID[$i] = $rows["OrderStatusID"];
                        $OrderStatusName[$i++] = $rows["OrderStatusName"];
                        echo "<a href=\"view_order_list.php?AccountID=" . $_REQUEST["AccountID"];
                        echo "&OrderStatusID=" . $rows["OrderStatusID"] . "\">";
                        echo $rows["OrderStatusName"] . "</a> |";
                    }
                    $OrderStatusAmount = $i;
                   
					echo "</span>";
					echo "</div>";
					
                    $result = selectOrderDetail($_REQUEST["AccountID"], $_REQUEST["OrderStatusID"]);
                    if (mysql_num_rows($result) <= 0) {
				?>
						
                
                <div class="itemcontainer">
                    <ul>
						<li>
							<p>This account have no order.</p>
						</li>
					</ul>
                </div>
                
                <?php
                    } else {
						
						echo "<div class=\"itemcontainer\">";
						echo "<ul>";
						
                        while ($rows = mysql_fetch_array($result)) {
                ?>

                        <li>
                            <a href="view_product.php?ProductID=<?php echo $rows["ProductID"]; ?>">
                                <?php echo "<p>" . $rows["ProductName"]; ?>
                            </a>
                
                <?php
                            echo " -> " . $rows["OrderStatusName"] . "</p>";
                    
                            if ($rows["OrderStatusName"] == "Ordered")
                                echo "<p>[ <a href=\"../functions/order_func.php?func=delete&OrderID=". $rows["OrderID"] . "&url=../admin/index.php\" >Delete</a> ]";
                            echo "<p>Edit status -> ";
                            for ($i = 0 ; $i < $OrderStatusAmount ; $i++) {
                                echo "<a href=\"../functions/order_func.php?func=update&OrderID=". $rows["OrderID"];
                                echo "&OrderStatusID=" . $OrderStatusID[$i] . "&url=../admin/index.php\">" . $OrderStatusName[$i] . "</a> | ";
                            }
                            echo "</p></li>";
                        }
                    }
                ?>
                    </ul>
                </div>
                
            </section>
            
		</article>
        
  	</body>
</html>
