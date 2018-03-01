<!-- page content -->
<div class="container">
	<div class="row">
		<!-- blog entries column -->
		<div class="col-md-8">

			<div class="panel panel-default">
				<div class="panel-heading">
					<center>Flat Details</center>

				</div>
				<!--/panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<tbody>
								<tr>
									<td>Available:</td>
									<td><?php echo $info[0]['AVAILIBILITY']==1 ? "Yes" : "No"; ?></td>
								</tr>
								<tr>
									<td>Contact Number:</td>
									<td><?php echo $contact_no; ?></td>
								</tr>
								<tr>
									<td>Contact Time:</td>
									<td><?php echo $contact_time; ?></td>
								</tr>
								<tr>
									<td>Apartment Address:</td>
									<td><?php echo $info[0]['ADDRESS'] ; ?></td>
								</tr>
								<tr>
									<td>Postal Code:</td>
									<td><?php echo $info[0]['POSTAL_CODE']; ?></td>
								</tr>
								<tr>
									<td>Total Area [Square Feet]:</td>
									<td><?php echo $info[0]['SQ_FEET']; ?></td>
								</tr>
								<tr>
									<td>Number of Bedrooms:</td>
									<td><?php echo $info[0]['NUMBER_OF_BEDROOM']; ?></td>
								</tr>
								<tr>
									<td>Number of Washrooms:</td>
									<td><?php echo $info[0]['NUMBER_OF_WASHROOM']; ?></td>
								</tr>
								<tr>
									<td>Desired Monthly Rent:</td>
									<td><?php echo $info[0]['BASE_RENT']; ?></td>
								</tr>
								<tr>
									<td>Service Charge:</td>
									<td><?php echo $info[0]['SERVICE_CHARGE']!=NULL ? "Tk.".$info[0]['SERVICE_CHARGE'] : ""; ?></td>
								</tr>
								<tr>
									<td>Total Monthly Rent:</td>
									<td>Tk. <?php echo $info[0]['BASE_RENT']+$info[0]['SERVICE_CHARGE'] ; ?></td>
								</tr>
								<tr>
									<td>Advance Rent Amount:</td>
									<td>Tk. <?php echo $info[0]['ADVANCE'] ; ?></td>
								</tr>
								<tr>
									<td>Gas Facility:</td>
									<td><?php echo $info[0]['GAS']==1 ?"Yes":"No" ; ?></td>
								</tr>
								<tr>
									<td>Lift Facility:</td>
									<td><?php echo $info[0]['LIFT']==1 ?"Yes":"No" ; ?></td>
								</tr>
								<tr>
									<td>Generator Facility:</td>
									<td><?php echo $info[0]['GENERATOR']==1 ?"Yes":"No" ; ?></td>
								</tr>
								<tr>
									<td>Drawing Room:</td>
									<td><?php echo $info[0]['DRAWING_ROOM']==1 ?"Yes":"No" ; ?></td>
								</tr>
								<tr>
									<td>Dining Room:</td>
									<td><?php echo $info[0]['DINING_ROOM']==1 ?"Yes":"No" ; ?></td>
								</tr>
								<tr>
									<td>Servant Room:</td>
									<td><?php echo $info[0]['SERVANT_ROOM']==1 ?"Yes":"No" ; ?></td>
								</tr>
								<tr>
									<td>Rurnished:</td>
									<td><?php echo $info[0]['FURNISHED']==1 ?"Yes":"No" ; ?></td>
								</tr>
								<tr>
									<td>Terms & Conditions:</td>
									<td><?php echo $info[0]['TERMS']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--/.table-responsive-->
				</div>


			</div>
			<!--/.panel-->
				<!--/.panel-body -->
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="item active">
							<img class="slide-image" src="<?php echo site_url('images/site/800_300.png');?>" alt="">
						</div>
						<div class="item">
							<img class="slide-image" src="<?php echo site_url('images/site/800_300.png');?>" alt="">
						</div>
						<div class="item">
							<img class="slide-image" src="<?php echo site_url('images/site/800_300.png');?>" alt="">
						</div>

					</div>
					<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
				<br /> <br /> <br /> <br />

				<!--Sms View-->
				      <div class="container">

				          <div class="row">

				              <div class="col-md-4 col-md-offset-4">
				                  <div class="login-panel panel panel-default">
				                      <div class="panel-heading">
				                          <h3 class="panel-title">Contact</h3>
				                      </div>
				                      <div class="panel-body">

				                <form action="http://sms.greenweb.com.bd/api.php" method="post">
				                <input type="hidden" name="token" value="a6ff0d856e1000f43a7935534189ff15" />
				                <label>Enter Recipent Number:<style="white-space:pre"></style> <input type="number" name="to"  /> </label> <br/>
				                <label>Enter Your Message Here:<textarea class="span" name="message" id="message" style="position=relative; left: 0%;" ></textarea> </label>
				                <button type="submit" name="submit" class="btn btn-success btn-large">Send Message</button>
				                </form>
				              </div>
				            </div>
				          </div>
				        </div>
				      </div>

				<!Sms View Ends-->






		</div>
