<?php
//    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<meta name="description" content="OTOP3D" />
		<meta name="keywords" content="OTOP3D"/>
		<meta itemprop="description" content="OTOP3D" />
        
		<title>OTOP3D Project</title>
		<link rel="shortcut icon" href="styles/favicon/favicon.ico" type="image/x-icon"/>
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link type="text/css" rel="stylesheet" href="../styles/reset.css" />
		<link type="text/css" rel="stylesheet" href="../styles/text.css" />
		<link type="text/css" rel="stylesheet" href="../styles/styles.css" />
  	</head>
  	<body>
		<article id="container">
			<nav>
				<ul>
					<li><a href="index.php"><div class="navcircle"><span class="navbar">Home</span></div></a></li>
                    <li><a href="view_order_list.php"><div class="navcircle"><span class="navbar">Order</span></div></a></li>
					<li><a href="../functions/logout_func.php"><div class="navcircle"><span class="navbar">Logout</span></div></a></li>
				</ul>
			</nav>
			
			<section>
				
				<div class="catnameline">
					<span class="textincat">
				
                <?php
                    require_once "../functions/order_func.php";
                    require_once "../functions/config.php";
                    
                    $query = "SELECT OrderStatusID, OrderStatusName FROM OrderStatus ORDER BY OrderStatusName";
                    $result = mysql_query($query);
                    
                    echo "<a href=\"view_order_list.php\">All orders</a> |";
                    
                    while ($rows = mysql_fetch_array($result)) {
                        echo "<a href=\"view_order_list.php?OrderStatusID=" . $rows["OrderStatusID"] . "\">";
                        echo $rows["OrderStatusName"] . "</a> |";
                    }
                    
					echo "</span>";
					echo "</div>";
					
                    $result = selectOrderDetail($_SESSION["AccountID"], $_REQUEST["OrderStatusID"]);
                    if (mysql_num_rows($result) <= 0) {
                ?>
                
				<div class="itemcontainer">
                    <ul>
						<li><p>Your account have no order.</p></li>
					</ul>
                </div>
				
				
                <?php
                    } else {
						
						echo "<div class=\"itemcontainer\">";
						echo "<ul>";
						
                        while ($rows = mysql_fetch_array($result)) {
							echo "<li>";
                            echo "<p><u>" . $rows["ProductName"] . "</u></p>";
                            echo "<p>" . $rows["OrderStatusName"] . "</p>";
                            
                            if ($rows["OrderStatusName"] == "Ordered")
                                echo "<p>[ <a href=\"../functions/order_func.php?func=delete&OrderID=". $rows["OrderID"] . "&url=../user/index.php\" >Delete</a> ]</p>";
							echo "</li>";
                        }
						
						echo "</ul";
						echo "</div>";
                    }
                ?>
			
            </section>
            
		</article>
        
  	</body>
</html>
