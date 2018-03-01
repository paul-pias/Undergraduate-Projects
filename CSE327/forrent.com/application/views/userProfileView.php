<!-- Page Content -->
<div class="row">
	<div class="col-md-8">
		<hr>
		<div class="form-group col-md-12">
			<img src="http://www.w3schools.com/bootstrap/paris.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"><br />
			<h4 class="text-uppercase">Your Name:</h4>
			<h5><?php echo $username;?></h5>
			<h4 class="text-uppercase">Your Email:</h4>
			<h5><?php echo $user_info['EMAIL']; ?></h5>
			<h4>Your Phone Number:</h4>
			<h5><?php echo isset($user_info['PHONE_NO']) ? $user_info['PHONE_NO'] : "N/A";?></h5>
			<h4>Your Contact Hours:</h4>
			<h5><?php echo isset($user_info['CONTACT_TIME']) ? $user_info['CONTACT_TIME'] : "N/A"; ?></h5>
			<span>
				<input id="input-1" type="file" name="file">
			</span>
			<br />
			<button type="button" class="btn btn-primary">Upload Image</button>
			<button type="button" class="btn btn-warning"><a href="<?php echo base_url('Chat/update');?>">Send SMS</button><br/><br/>

		</div>
		<!-- Blog Entries Column -->
		<div class="col-md-14">
			<?php if (is_array($rooms)): ?>
				<?php foreach ($rooms as $row):?>
					<div class="col-sm-12 col-lg-6 col-md-6">
						<div class="thumbnail">
							<img src="<?php echo site_url('images/site/320_150.png');?>" alt="">
							<div class="caption">
								<h4>Type: Room</h4>
								<h4 class="pull-left">#of Members: <?php echo $row['NUMBER_OF_MEMBERS']; ?></h4>
								<h4 class="pull-right">, Rent: Tk.<?php echo $row['BASE_RENT']; ?></h4>
								<h4 class="pull-left">, Sharable: <?php echo $row['SHARABLE']==1 ? "Yes" : "No" ; ?></h4>
								<h4>Address: <?php echo $row['ADDRESS']; ?></h4>
								<br><center>
									<button type="button" class="btn btn-success"><a style="color: white; text-decoration: none;" href="<?php echo base_url('room/').$row['ROOM_ID'];?>">View Details</a></button>
								</center>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="col-md-14">
			<?php if(is_array($flats)): ?>
				<?php foreach ($flats as $row): ?>
				<div class="col-sm-12 col-lg-6 col-md-6">
					<div class="thumbnail">
						<img src="<?php echo site_url('images/site/320_150.png') ?>" alt="">
						<div class="caption">
							<h4>Type: Flat</h4>
							<h4 class="pull-left">Total Area: <?php echo $row ['SQ_FEET']; ?></h4>
							<h4 class="pull-right">, Rent: Tk.<?php echo $row['BASE_RENT']; ?></h4>
							<h4 class="pull-left">, Rooms: <?php echo $row['NUMBER_OF_BEDROOM']; ?></h4>
							<h4>Adress: <?php echo $row['ADDRESS']; ?></h4>
							<br><center>
								<button type="button" class="btn btn-success"><a style="color: white; text-decoration: none;" href="<?php echo base_url('flat/').$row['FLAT_ID']; ?>">View Detials</a></button>
							</center>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
