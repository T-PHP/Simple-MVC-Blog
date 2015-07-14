<?php

use Core\Error;
use Helpers\Session;

$token = trim($data['token']);
Session::set('token', $token);

?>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default mtop15">
            <div class="panel-heading">
                <h3 class="panel-title">New category</h3>
            </div>
            
            <div class="panel-body">
                <?php echo Error::display($error); ?>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#informations" data-toggle="tab"><i class="fa fa-info"></i> Informations</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active p5" id="informations">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="category_name">Name</label>
                                <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Name" value="<?php if(isset($error)){ echo $_POST['category_name']; }?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="category_description">Long Description</label>
                                <textarea class="form-control tinymce" name="category_description" rows="10"></textarea>
                            </div>
                            <input type="hidden" name="token" value="<?php echo $token; ?>" />
                            <p class="text-right"><input class="btn btn-success" type="submit" name="submit" value="Add Category"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>