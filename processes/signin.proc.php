<?php
	if (!isset($_SESSION['vx_admin'])) {
		$username = mysql_real_escape_string($_POST['username']);
		$password = md5(mysql_real_escape_string($_POST['password']));
		$query = "SELECT COUNT(Username) AS cnt, Username FROM vx_admin WHERE Username = '" . $username . "' AND Password = '" . $password . "'";
		$row = mysql_fetch_array(mysql_query($query));
		
		if ($row['cnt'] != 0) { // login success.
			$_SESSION['vx_admin']['Username'] = $row['Username'];
			?>
				<div class="alert alert-success">
					<h3>เข้าสู่ระบบสำเร็จ</h3>
					<p>ยินดีต้อนรับสู่ระบบผู้ดูแลระบบ</p>
				</div>
			<?php
		} else {
			?>
				<div class="alert alert-error">
					<h3>เข้าสู่ระบบผิดพลาด</h3>
					<p>กรุณาตรวจสอบชื่อผู้ หรือหรัสผ่านของท่าน</p>
				</div>
			<?php
		} // End if-else.
	} else {
		?>
			<div class="alert alert-error">
				<h3>มีการเข้าสู่ระบบแล้ว</h3>
			</div>
		<?php
	}
?>