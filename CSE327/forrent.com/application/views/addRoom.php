<!-- Page Content -->
<div class="container">

	<div class="row">

		<div class="col-md-8 col-md-offset-2">


			<center><h4 class="text-uppercase">Add Details Info:</h4></center>
			<hr>
			<div class="form-group col-md-12">
				<?php echo form_open('User/addRoom'); ?>

				<?php echo form_error('ADDRESS'); ?>
				<input name="ADDRESS" style="text-align: center;" class="form-control" placeholder="Enter Your Apartment Address" value="<?php echo set_value('ADDRESS'); ?>"><br />

				<?php echo form_error('POSTAL_CODE'); ?>
				<input name="POSTAL_CODE" style="text-align: center;" class="form-control" placeholder="Enter Your Postal Code" value="<?php echo set_value('POSTAL_CODE'); ?>"><br />

				<?php echo form_error('NUMBER_OF_MEMBERS'); ?>
				<input name="NUMBER_OF_MEMBERS" style="text-align: center;" class="form-control" placeholder=" Number of Members" value="<?php echo set_value('NUMBER_OF_MEMBERS'); ?>"><br />

				<?php echo form_error('BASE_RENT'); ?>
				<input name="BASE_RENT" style="text-align:center;" class="form-control" placeholder=" Desired Apartment Rent Monthly" value="<?php echo set_value('BASE_RENT'); ?>"><br />

				<input name="SERVICE_CHARGE" style="text-align:center;" class="form-control" placeholder=" Service Charge" value="<?php echo set_value('SERVICE_CHARGE'); ?>"><br />

				<input name="WIFI_CHARGE" style="text-align: center;" class="form-control" placeholder="Wifi Charge" value="<?php echo set_value('WIFI_CHARGE'); ?>"><br/>

				<?php echo form_error('ADVANCE'); ?>
				<input name="ADVANCE" style="text-align:center;" class="form-control" placeholder=" Advance Rent Amount" value="<?php echo set_value('ADVANCE'); ?>"><br />

				<textarea name="TERMS" style="text-align:center;" class="form-control" rows="3" placeholder="Terms and Conditions" value="<?php echo set_value('TERMS'); ?>"></textarea>

				<div class="checkbox">
					<label>
						<input name="checkboxValues[]" type="checkbox" value="1">Servant
					</label><br />
					<label style="display: hidden">
						<input name="checkboxValues[]" type="checkbox" value="2">Furnished
					</label><br />
					<label>
						<input name="checkboxValues[]" type="checkbox" value="3">TV
					</label><br />
					<label>
						<input name="checkboxValues[]" type="checkbox" value="4">Balcony
					</label><br />
					<label>
						<input name="checkboxValues[]" type="checkbox" value="5">Attached Washroom
					</label><br />
					<label>
						<input name="checkboxValues[]" type="checkbox" value="6">Wifi
					</label><br />
					<label>
						<input name="checkboxValues[]" type="checkbox" value="7">Sharable
					</label><br />
					<label>
						<input name="checkboxValues[]" type="checkbox" value="8">Meal System
					</label><br />
					<label>
						<input name="checkboxValues[]" type="checkbox" value="9">Water Filter
					</label><br />
					<label>
						<input name="checkboxValues[]" type="checkbox" value="10">Fridge
					</label><br />
					
				</div>

				<center><h4 class="text-uppercase">Please Upload Images</h4></center>
				<div class="form-group">
					<label>Image 1</label>
					<input type="file">
					<label>Image 2</label>
					<input type="file">
					<label>Image 3</label>
					<input type="file">
				</div>


				<center><input type="submit" class="btn btn-primary" value="Add Apartment Info"/></center>

		</div>

	</div>

</div>
