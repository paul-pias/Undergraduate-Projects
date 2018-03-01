<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <?php echo form_open('Fblogin'); ?>
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Facebook Email Address" name="EMAIL" type="text" value="<?php echo set_value('EMAIL'); ?>" autofocus>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Submit"/>
                        </fieldset>
                </div>
            </div>
        </div>
    </div>
