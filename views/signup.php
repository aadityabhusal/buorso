<section>
	<div class="container">
		<div id="account-form-wrapper">
			<div id="account-form-container">
				<h1 class="account-form-title">Create an Account</h1>
				<form id="account-form" action="signup" method="POST">
					<div class="form-extra">
						<input type="text" class="input-short" name="firstname" value="<?php echo $fieldFirstname; ?>" placeholder="Enter your First Name" required>
						<input type="text" class="input-short" name="lastname" value="<?php echo $fieldLastname ?>" placeholder="Enter your Last Name" required>
					</div>
					<input type="email" name="email" placeholder="Enter your Email" value="<?php echo $fieldEmail ?>" required>
					<input type="number" name="phone" value="<?php echo $fieldPhone ?>" placeholder="Enter your Phone Number" required>
					<input type="password" name="password" placeholder="Enter your Password" required>
					<input type="submit" class="button" name="submit" value="Create an Account">
					<div class="agreenotice">
					By creating your account, you agree to Buorso's <a href="../terms/">Terms and Conditions</a> of Use and <a href="../privacy/">Privacy Policy</a>.
				</div>
				</form>
				<div>Already have an Account? <a href="login">Log In</a></div>
			</div>
		</div>
	</div>
</section>
