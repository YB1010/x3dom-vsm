<?php	
	if (isset($_SESSION['vx_admin'])) {
		unset($_SESSION['vx_admin']);
		
		if (!isset($_SESSION['vx_admin'])) { // login success.
			?>
				<div class="alert alert-success">
					<h3>ออกจากระบบสำเร็จ</h3>
				</div>
			<?php
		} else {
			?>
				<div class="alert alert-error">
					<h3>ออกจากระบบผิดพลาด</h3>
				</div>
			<?php
		} // End if-else.
	} else {
		?>
			<div class="alert alert-error">
				<h3>ยังไม่มีการเข้าสู่ระบบ</h3>
			</div>
		<?php
	}
?>