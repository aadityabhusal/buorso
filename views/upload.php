<section>
	<div class="container">
		<form id="upload-container" action="#" method="POST">
			<div id="upload-images">
				<div class="image-container">
					<img src="images/product/default.png" class="all0" alt="Aaditya Bhusal">
					<input type="file" name="productImage" id="productImage" class="hidden-file">
					<label class="filelabel" for="productImage">Add Image</label>
				</div>
				<div class="image-container-small">
					<div>
						<img src="images/product/default.png" class="all0" alt="Aaditya Bhusal">
						<input type="file" name="productImage2" id="productImage2" class="hidden-file">
					</div>
					<label class="filelabel2" for="productImage2">Add Image</label>
				</div>
				<div class="image-container-small">
					<div>
						<img src="images/product/default.png" class="all0" alt="Aaditya Bhusal">
						<input type="file" name="productImage3" id="productImage3" class="hidden-file">
					</div>
					<label class="filelabel2" for="productImage3">Add Image</label>
				</div>
				<div class="image-container-small">
					<div>
						<img src="images/product/default.png" class="all0" alt="Aaditya Bhusal">
						<input type="file" name="productImage4" id="productImage4" class="hidden-file">
					</div>
					<label class="filelabel2" for="productImage4">Add Image</label>
				</div>
			</div>
			<div id="upload-info">
				<input type="text" name="productTitle" placeholder="Enter the Title of the Product" required>
				<textarea class="scroll" name="productDescription" maxlength="2048" placeholder="Enter the Description of the Product" required></textarea>
				<input type="text" name="productTitle" placeholder="Enter tags for the Product (with a , after every tag)">
				<div>
					<input class="input-short save-button" type="submit" name="uploadProduct" value="Upload">
					<a href="#" class="input-short cancelbtn">Cancel</a>
				</div>
			</div>
			<div id="upload-details">
				<select name="productCategory" required>
					<option value="" selected="selected" style="color:#7f8c8d;">Categories</option>
				</select>
				<select name="productCondition" required>
					<option value="" selected="selected" style="color:#7f8c8d;">Condition</option>
					<option value="Brand New">Brand New</option>
					<option value="Just Used">Just Used</option>
					<option value="Little Old">Little Old</option>
					<option value="Too Old">Too Old</option>
				</select>
				<input type="text" name="productPrice" placeholder="Enter the Price" required>	
				<input type="text" name="productPhone" placeholder="Enter your Phone Number" required>
				<input type="text" name="productLocation" placeholder="Enter the Location to Recieve" required>
				<input type="text" name="productManufacturer" placeholder="Company name / Homemade" required>
				<select name="productPrivacy" required>
					<option value="Public" selected="selected" style="color:#7f8c8d;">Public</option>
					<option value="Unlisted">Unlisted</option>
					<option value="Private">Private</option>
				</select>
			</div>
		</form>
		
	</div>
</section>