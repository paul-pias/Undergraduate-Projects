 <!-- Page Content -->
<div class="container">

	<div class="row">

		<div class="col-md-8 col-md-offset-2">


			<center><h4 class="text-uppercase">Add Details Info:</h4></center>
			<hr>
			<div class="form-group col-md-12">
				<?php echo form_open('User/addFlat'); ?>

				<?php echo form_error('ADDRESS'); ?>
				<input name="ADDRESS" style="text-align: center;" class="form-control" placeholder="Enter Your Apartment Address" value="<?php echo set_value('ADDRESS'); ?>"><br />

				<?php echo form_error('POSTAL_CODE'); ?>
				<input name="POSTAL_CODE" style="text-align: center;" class="form-control" placeholder="Enter Your Postal Code" value="<?php echo set_value('POSTAL_CODE'); ?>"><br />

				<?php echo form_error('SQ_FEET'); ?>
				<input name="SQ_FEET" style="text-align: center;" class="form-control" placeholder="Total Square Feet" value="<?php echo set_value('SQ_FEET'); ?>"><br />

				<?php echo form_error('NUMBER_OF_BEDROOM'); ?>
				<input name="NUMBER_OF_BEDROOM" style="text-align: center;" class="form-control" placeholder="# Number of Bedrooms" value="<?php echo set_value('NUMBER_OF_BEDROOM'); ?>"><br />

				<input name="NUMBER_OF_WASHROOM" style="text-align:center;" class="form-control" placeholder="# Number of Washrooms" value="<?php echo set_value('NUMBER_OF_WASHROOM'); ?>"><br />

				<input name="NUMBER_OF_BALCONY" style="text-align:center;" class="form-control" placeholder="# Number of Balcony" value="<?php echo set_value('NUMBER_OF_BALCONY'); ?>"><br />

				<?php echo form_error('BASE_RENT'); ?>
				<input name="BASE_RENT" style="text-align:center;" class="form-control" placeholder=" Desired Apartment Rent Monthly" value="<?php echo set_value('BASE_RENT'); ?>"><br />

				<input name="SERVICE_CHARGE" style="text-align:center;" class="form-control" placeholder=" Service Charge" value="<?php echo set_value('SERVICE_CHARGE'); ?>"><br />

				<?php echo form_error('ADVANCE'); ?>
				<input name="ADVANCE" style="text-align:center;" class="form-control" placeholder=" Advance Rent Amount" value="<?php echo set_value('ADVANCE'); ?>"><br />

				<textarea name="TERMS" style="text-align:center;" class="form-control" rows="3" placeholder="Terms and Conditions" value="<?php echo set_value('TERMS'); ?>"></textarea>

				<div class="checkbox">
					<label>
					<input name="checkboxValues[]" type="checkbox" value="1">Gas
					</label><br />	
					<label>
					<input name="checkboxValues[]" type="checkbox" value="2">Lift
					</label><br />	
					<label>
					<input name="checkboxValues[]" type="checkbox" value="3">Generator
					</label><br />	
					<label>
					<input name="checkboxValues[]" type="checkbox" value="4">Drawing Room
					</label><br />
					<label>
					<input name="checkboxValues[]" type="checkbox" value="5">Dining Room
					</label><br />
					<label>
					<input name="checkboxValues[]" type="checkbox" value="6">Servant Room
					</label><br />
					<label>
					<input name="checkboxValues[]" type="checkbox" value="7">Furnished
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