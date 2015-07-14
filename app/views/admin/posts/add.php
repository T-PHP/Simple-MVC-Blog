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
                <h3 class="panel-title">New post</h3>
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
                                <label for="post_name">Name</label>
                                <input type="text" name="post_name" class="form-control" id="post_name" placeholder="Name" value="<?php if(isset($error)){ echo $_POST['post_name']; }?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="post_category_id">Default Category</label>
                                <select class="form-control" name="post_category_id" id="post_category_id">
                                    <?php foreach($data['categories'] AS $row): ?>
                                        <option value="<?php echo $row->category_id; ?>" <?php if ($data['row'][0]->post_category_id == $row->category_id): echo 'selected'; endif; ?>><?php echo $row->category_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="post_short_description">Short Description</label>
                                <textarea class="form-control tinymce" name="post_short_description" rows="10"></textarea>
                            </div>
                            <input type="hidden" name="token" value="<?php echo $token; ?>" />
                            <p class="text-right"><input class="btn btn-success" type="submit" name="submit" value="Add Post"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>