
<div class="container">

     <div class="row">


         <div class="col-md-8">          


                 <div class="panel panel-default">
                      <div class="panel-heading">
                         <center>Room Details</center>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <tr>
                                   <td>Available:</td>
                                <td><?php echo $info[0]['AVAILIBILITY']==1 ? "Yes" : "No"; ?></td>
                                </tr>
                                <tr>
                                    <td>contact Number:</td>
                                    <td><?php echo $contact_no; ?></td>
                                </tr>
                                <tr>
                                    <td>Contact Time:</td>
                                    <td><?php echo $contact_time;  ?></td>
                                </tr>
                                <tr>
                                    <td>Apartment Address:</td>
                                    <td> <?php echo $info[0]['ADDRESS']; ?></td>
                                </tr>
                                <tr>
                                    <td>Postal Code: </td>
                                    <td> <?php echo $info[0]['POSTAL_CODE']; ?></td>
                                </tr>
                                <tr>
                                    <td>Number of Member:</td>
                                    <td><?php echo $info[0]['NUMBER_OF_MEMBERS'];?></td>
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
                                    <td>Wifi Charge:</td>
                                    <td> <?php echo $info[0]['WIFI_CHARGE']!=NULL ? "Tk. ".$info[0]['WIFI_CHARGE']: ""; ?></td>
                                </tr>
                                <tr>
                                    <td>Total Monthly Rent:</td>
                                    <td> Tk. <?php echo $info[0]['BASE_RENT']+$info[0]['SERVICE_CHARGE']; ?></td>
                                </tr>
                                <tr>
                                    <td>Advance Rent Amount:</td>
                                    <td> Tk. <?php echo $info[0]['ADVANCE']; ?></td>
                                </tr>
                                <tr>
                                    <td>Servent:</td>
                                    <td><?php echo $info[0]['SERVANT']==1 ? "Yes" : "No"; ?></td>
                                </tr>
                                <tr>
                                     <td>TV:</td>
                                     <td><?php echo $info[0]['TV']==1 ? "Yes" : "No"; ?></td>
                                </tr>
                                <tr>
                                    <td>Balcony:</td>
                                    <td><?php echo $info[0]['BALCONY']==1 ? "Yes" : "No"; ?></td>
                                </tr>
                                <tr>
                                    <td>Attached Washroom:</td>
                                     <td><?php echo $info[0]['ATTACHED_WASHROOM']==1 ? "Yes" : "No"; ?></td>
                                </tr>
                                <tr>
                                    <td>Wifi:</td>
                                     <td><?php echo $info[0]['WIFI']==1 ? "Yes" : "No"; ?></td>
                                </tr>
                                <tr>
                                    <td>Sharable</td>
                                    <td><?php echo $info[0]['SHARABLE']==1 ? "Yes" : "No"; ?></td>
                                </tr>
                                <tr>
                                    <td>Meal System</td>
                                    <td><?php echo $info[0]['MEAL_SYSTEM']==1 ? "Yes" : "No"; ?></td>
                                </tr>
                                <tr>    
                                    <td>Fridge</td>
                                    <td><?php echo $info[0]['FRIDGE']==1 ? "Yes" : "No"; ?></td>
                                </tr>
                                <tr>
                                    <td>Terms & Conditions: </td>
                                    <td><?php echo $info[0]['TERMS'];?></td>
                                 </tr>
                              </tbody>
                          </table>
                      </div>
             
                  </div>
             
              </div>


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
                    <a class="rigt carousel-control" href="#carousel-example-generic" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
      </div>








