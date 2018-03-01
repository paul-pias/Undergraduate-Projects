<!--Page Content-->
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-tittle">
							Please Sign In
						</h3>
					</div>
					<div class="panel-body">
						<?php echo form_open('Login'); ?>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Email Address" name="EMAIL" type="text" value="<?php echo set_value('EMAIL'); ?>" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<!-- Change this to a button or input when using this as a form-->
							<input type="submit" class="btn btn-lg btn-success btn-block" value="Submit">
						</fieldset>
						<center><h4>or</h4></center>
        				<center>
          					<button type="button" class="btn btn-success">
            					<a style="color: white; text-decoration: none;"; href="<?php echo site_url('fblogin'); ?>">Login With Facebook</a>
          					</button>
        				</center>
					</div>
				</div>
			</div>
		</div>
	</div>