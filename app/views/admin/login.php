<?php

use Core\Error;

?>

<?php echo Error::display($error); ?>
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">Blog Admin</div>
            </div>     

            <div class="panel-body" >

                <form action="" method="post">
                   
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="user" type="text" class="form-control" name="member_username" value="" placeholder="Username">                                        
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="member_password" value="" placeholder="Password">
                    </div>                                                                  

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" name="submit" href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Log in</button>                          
                        </div>
                    </div>

                </form>     

            </div>                     
        </div> 
    </div>

