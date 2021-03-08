<section>
	<div class="container">
		<div id="account-form-wrapper">
			<div id="account-form-container">
				<h1 class="account-form-title">Log In</h1>
				<form id="account-form" action="login" method="POST">
					<input type="email" name="email" value="<?php echo $fieldEmail; ?>" placeholder="Enter your Email" required>
					<input type="password" name="password" placeholder="Enter your Password" required>
					<div class="form-extra">
						<label>
							<input type="checkbox" name="keeplogged" checked="checked">
							Keep me logged in
						</label>
						<a href="">Forgot Password?</a>
					</div>
					<input type="submit" class=".button" name="submit" value="Log In">
				</form>
				<div>Don't have an Account? <a href="signup">Create an account</a></div>
			</div>
		</div>
	</div>
</section>