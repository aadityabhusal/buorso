<section>
	<div id="settings-container" class="container">
		<section class="left-section">
			<h3 class="title label">Settings</h3>
			<ul class="hover-bg">
				<li><a href="profile-settings">Profile Settings</a></li>
				<li><a href="account-settings">Account Section</a></li>
				<li><a href="privacy-settings" class="active">Privacy Settings</a></li>
			</ul>
		</section>
		<section class="right-section">
			<h3 class="title label">Privacy Settings</h3>
			<form id="settings-section" action="#" method="POST">
				<div class="settings-box">
					<div class="label title">Products Visibility</div>
					<div>
						<label>
							<input type="checkbox" id="productVisibility" name="productVisibility" value="0">Do not allow anyone to see my products
						</label>
					</div>
				</div>
				<div class="settings-box">
					<div class="label title">Messaging</div>
					<div>
						<label>
							<input type="checkbox" id="allowMessaging" name="allowMessaging" value="0">Do not allow anyone to send me message
						</label>
					</div>
				</div>
				<div class="settings-box">
					<div class="label title">Commenting</div>
					<div>
						<label>
							<input type="checkbox" id="allowCommenting" name="allowCommenting" value="0">Do not allow anyone to comment on my products
						</label>
					</div>
				</div>
				<div class="settings-box">
					<div class="label title">Phone Visibility</div>
					<div>
						<label>
							<input type="checkbox" id="phoneVisibility" name="phoneVisibility" value="0" checked="checked">Do not allow anyone to see my phone number
						</label>
					</div>
				</div>
				<div class="settings-box">
					<div class="label title">Address Visibility</div>
					<div>
						<label>
							<input type="checkbox" id="addressVisibility" name="addressVisibility" value="0">Do not allow anyone to see my address
						</label>
					</div>
				</div>
				<div class="settings-box">
					<div class="label title">Adult Products</div>
					<div>
						<label>
							<input type="checkbox" id="allowAdultProducts" name="allowAdultProducts" value="0">Allow adult products to appear in your feed
						</label>
					</div>
				</div>
			</form>
		</section>
	</div>
</section>