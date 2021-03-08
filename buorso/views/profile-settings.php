<section>
	<div id="settings-container" class="container">
		<section class="left-section">
			<h3 class="title label">Settings</h3>
			<ul class="hover-bg">
				<li><a href="profile-settings" class="active">Profile Settings</a></li>
				<li><a href="account-settings">Account Section</a></li>
				<li><a href="privacy-settings">Privacy Settings</a></li>
			</ul>
		</section>
		<section class="right-section">
			<h3 class="title label">Profile Settings</h3>
			<form id="settings-section" action="profile-settings" method="POST">
				<div class="label">Edit your Profile Picture and Information</div>
				<div>
					<div id="profile-image" class="image-container">
						<img src="images/user/default.png" class="all0" alt="Aaditya Bhusal">
						<input type="file" name="profile_image" id="userImage" class="hidden-file">
						<label class="filelabel" for="userImage">Change Image</label>
					</div>
					<div id="profile-info">
						<div class="form-extra">
							<input type="text" class="input-short" name="firstname" value="<?php echo $firstname ?>" placeholder="Enter your First Name" required>
							<input type="text" class="input-short" name="lastname" value="<?php echo $lastname ?>" placeholder="Enter your Last Name" required>	
						</div>
						<input type="text" name="profession" value="<?php echo $profession ?>" placeholder="Enter your Profession" required>	
						<input type="text" name="phone" value="<?php echo $phone ?>" placeholder="Enter your Phone Number" required>	
						<input type="text" name="address" value="<?php echo $address ?>" placeholder="Enter your Address" required>
					</div>
				</div>
				<div class="label">Edit your Description</div>
				<div>
					<textarea name="profile_bio" class="scroll" maxlength="2048" placeholder="Enter the description of your Profile"><?php echo $profile_bio ?></textarea>
				</div>
				<div>
					<input class="save-button" type="submit" name="submit" value="Save Changes">
					<a href="#" class="cancelbtn">Cancel</a>
				</div>
			</form>
		</section>
	</div>
</section>