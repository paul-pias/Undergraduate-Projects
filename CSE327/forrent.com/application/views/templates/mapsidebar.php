<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <?php echo form_open('Map/index'); ?>

        <center><h4 class="text-uppercase">Search A Location For Rent</h4></center>

        <h4>Location:</h4>
        <div class="input-group col-md-12">
            <input name="LOCATION_SEARCH" type="text" class="form-control" value="<?php echo set_value("LOCATION_SEARCH"); ?>">
        </div>  
        <div class="input-group col-md-12">
            <h4></h4>
            <center><input type="submit" class="btn" value="Search"/>
            </center>
        </div>
    </div>

    <!-- Blog Search Well -->
    <div class="well">
        <?php echo form_open('Map/index'); ?>

        <center><h4 class="text-uppercase">Get Direction</h4></center>
                            
        <h4>Start Address:</h4>
        <div class="input-group col-md-12">
            <input name="START" type="text" class="form-control" value="<?php echo set_value("START"); ?>">
        </div>
        <h4>End Address:</h4>
        <div class="input-group col-md-12">
            <input name="END" type="text" class="form-control" value="<?php echo set_value("END"); ?>">
        </div>
        <div class="input-group col-md-12">
            <h4></h4>
            <center><input type="submit" class="btn" value="Go"/>
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