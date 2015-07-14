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
                <h3 class="panel-title">Edit your robots.txt file</h3>
                <div class="pull-right"><?php echo $data['robots_status']; ?></div>
            </div>
            
            <div class="panel-body">
                <?php echo Error::display($error); ?>
                <?php echo Session::message('message');?>
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
                                <label for="robots">Robots.txt content</label>
                                <textarea class="form-control" name="robots" id="robots" rows="6"><?php echo $data['robots_content']; ?></textarea>
                            </div>

                            <input type="hidden" name="token" value="<?php echo $token; ?>" />
                            <p class="text-right"><input class="btn btn-success" type="submit" name="submit" value="Update robots.txt"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>