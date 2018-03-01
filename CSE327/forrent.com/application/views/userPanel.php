<!-- Page Content -->
<div class="container">

	<div class="row">

		<div class="col-md-12">

			<center>
				<h2 class="text-uppercase">Add Your Appartment Info				
				</h2>				
			</center>
			<hr>
			<div class="form-group col-md-12">

				<div class="form-group">
					<style>.error {color: #FF0000;}</style>
					<?php
					$type = $typeErr = "";

					if ($_SERVER["REQUEST_METHOD"] == "POST") {
  						if (empty($_POST["type"])) {
    						$typeErr = "type is required";
  						} else {
    						$type = test_input($_POST["type"]);
  						}
					}

					function test_input($data) {
  						$data = trim($data);
  						$data = stripslashes($data);
  						$data = htmlspecialchars($data);
  						return $data;
					} ?>

					<center><h3 class="text-uppercase">Choose A Type:</h3>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  					<h4>
  					<input type="radio" name="type" <?php if (isset($type) && $type=="flat") echo "checked";?> value="flat"> Flat     					
  					<input type="radio" name="type" <?php if (isset($type) && $type=="room") echo "checked";?> value="room"> Room  
  					<span class="error">* <?php echo $typeErr;?></span>
  					<br><br>
  					<?php echo form_open('User/addFlatRoom');
  						 set_value('type',$type);?>
  					<input type="submit" class="btn btn-success" name="submit" value="Submit Type">  
					</h4>
					</form></center>
					

					
				</div>
				
			</div>			
		</div>	


	</div>