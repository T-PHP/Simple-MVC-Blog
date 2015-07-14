<?php

use Core\Error;

?>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default mtop15">
            <div class="panel-heading">
                <h3 class="panel-title">New Admin Member</h3>
            </div>
            
            <div class="panel-body">
                <?php echo Error::display($error); ?>
                <form action="" method="post">
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="">
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="">
                    </div>
                    
                    <input type="hidden" name="token" value="<?php echo $token; ?>" />
                    
                    <p class="text-right"><input class="btn btn-success" type="submit" name="submit" value="Add Member"></p>
                </form>
            </div>
        </div>
    </div>
</div>