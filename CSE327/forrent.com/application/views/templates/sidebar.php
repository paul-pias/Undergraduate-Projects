<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <?php echo form_open('Home/home_search'); ?>

        <center><h4 class="text-uppercase">Search For Your Desired Flat/Room</h4></center>
        <!-- /.input-group -->
        <h4>Rent [Maximum]</h4>
        <div class="input-group col-md-12">
            <input name="BASE_RENT_SEARCH"
            type="text" class="form-control" value="<?php echo set_value("BASE_RENT_SEARCH"); ?>">
        </div>
        <!-- /.input-group -->
        <h4>Type [Room or Flat]</h4>
        <div class="input-group col-md-12">
            <input name="TYPE_SEARCH"
            type="text" class="form-control" value="<?php echo set_value("TYPE_SEARCH"); ?>">
        </div>
        <!-- /.input-group -->
        <h4>Number of Bedrooms</h4>
        <div class="input-group col-md-12">
            <input name="NUMBER_OF_BEDROOM_SEARCH"
            type="text" class="form-control" value="<?php echo set_value("NUMBER_OF_BEDROOM_SEARCH"); ?>">
        </div>
        <!-- /.input-group -->
        <h4>Total Area [in Square Feet]</h4>
        <div class="input-group col-md-12">
            <input name="SQ_FEET_SEARCH"
            type="text" class="form-control" value="<?php echo set_value("SQ_FEET_SEARCH"); ?>">
        </div>
        <!-- /.input-group -->
        <h4>Location</h4>
        <div class="input-group col-md-12">
            <input name="LOCATION_SEARCH"
            type="text" class="form-control" value="<?php echo set_value("LOCATION_SEARCH"); ?>">
        </div>  

        <div class="input-group col-md-12">
            <h4></h4>
            <center><input type="submit" class="btn" value="Search"/>
            </center>
        </div>
    </div>

    <!-- Blog Categories Well -->
    <?php if (isset($username)):?>
        <div class="well">
            <div class="row">
                <!-- /.col-lg-6 -->
                <center>
                    <button type="button" class="btn btn-primary">Compare List</button><br /><br />
                    <button type="button" class="btn btn-primary">Favourites List</button>
                </center>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>

    <?php endif; ?>



    <!-- Side Widget Well -->
</div>
<!-- /.row -->

<hr>