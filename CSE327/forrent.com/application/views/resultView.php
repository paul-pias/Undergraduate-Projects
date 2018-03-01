<div class="container">
	<div class="row">
	     <div class="col-md-8">

	     <hr>
	     <?php if ($results!=false): ?>
	     <?php foreach ($results as $row):?>
	     	<?php if (array_key_exists('TYPE', $row)): ?>
	     		<div class="col-sm-6 col-lg-6 col-md-6">
	     		  <div class="thumbnail">
	     		  <img src="<?php echo site_url('images/site/320_150.png');?>" alt ="">
	     	 <div class="caption">
	     	 <?php if ($row['TYPE'] == 0): ?>
	     	 	<h4>Type: Flat</h4>
	     	 	<h4 class="pull-right">Rent: TK.<?php echo $row['info']['BASE_RENT']; ?><h4>
	     	 	<h4 class="pull-left">Total Area: <?php echo $row['info']['SQ_FEET']; ?></h4>
	     	 	<h4 class="pull-right">Rooms: <?php echo $row['info']['NUMBER_OF_BEDROOM']; ?></h4>
	     	 	<h4 class="pull-left"> Address: <?php echo $row['info']['ADDRESS']; ?></h4><p>

	     	 	<?php if (isset($username)): ?>
	     	 		<p>
	     	 		<button type="button" class="btn btn-primary">Add to Compare</button>
	     	 		<button type="button" class="btn btn-primary pull right"> Add to Favourites</button>
	     	 		</p>
	     	 	<?php endif; ?>

	     	 	<p><center>
	     	 	<button type="button" class="btn btn-success"><a style="color: white; text-decoration: none;" href="<?php echo base_url('flat/').$row['info']['FLAT_ID'];?>">View Details</a></button>
	     	 	</center></p>
	     	 <?php else: ?>
	     	 	<h4>Type: Room</h4>
	     	 	<h4 class="pull-right">Rent: Tk.<?php echo $row['info']['BASE_RENT']; ?></h4>
	     	 	<h4 class="pull-left">No. of Members: <?php echo $row['info']['NUMBER_OF_MEMBERS']; ?></h4>
	     	 	<h4 class="pull-right">Shareable: <?php echo $row['info']['SHARABLE']==1 ? "Yes" : "No"; ?></h4>
	     	 	<h4 class="pull-left">Address: <?php echo $row['info']['ADDRESS']; ?> </h4><p>


	     	 	<?php if (isset($username)): ?>
	     	 		<p>
	     	 		<button type="button" class="btn btn-primary">Add to Compare</button>
	     	 		<button type="button" class="btn btn-primary pull-right">Add to Favourites</button>
	     	 		</p>
	     	 	<?php endif; ?>

	     	 	<p><center>
	     	 	<button type="button" class="btn btn-success"><a style="color: white;text-decoration: none;" href="<?php echo base_url('room/').$row['info']['ROOM_ID'];?>"> View Details</a></button>
	     	 	</center></p>
	     	 <?php endif; ?>

	     		  	
	     		  </div>

	     		  	
	     		  
	     			
	     		</div>


		
	             </div>
	             <?php endif; ?>
	         <?php endforeach; ?>
     <?php endif ?>
</div>