<?php if (!isset($_SESSION['vx_admin'])) { ?>
	<div class="hero-unit">
		<h2>Sign in.</h2><hr>
		<form class="form-horizontal" action="./proc.php?p=signin" method="post">
			<div class="control-group">
				<label class="control-label" for="inputUsername">Username</label>
				<div class="controls">
					<input type="text" id="inputUsername" name="username" required="required" placeholder="Username">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
					<input type="password" id="inputPassword" name="password" required="required" placeholder="Password">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-large btn-success">Sign in</button>
				</div>
			</div>
		</form>
	</div>
<?php } else {
	include './pages/notify.page.php';
} ?>