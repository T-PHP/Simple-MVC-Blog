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
                <h3 class="panel-title">Edit category <?php echo $data['row'][0]->category_name; ?></h3>
            </div>
            
            <div class="panel-body">
                <?php echo Error::display($error); ?>
                <?php echo Session::message('message');?>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#informations" data-toggle="tab"><i class="fa fa-info"></i> Informations</a>
                    </li>
                    <li><a href="#seo" data-toggle="tab"><i class="fa fa-cog"></i> SEO</a>
                    </li>
                    <li><a href="#images" data-toggle="tab"><i class="fa fa-image"></i> Image</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active p5" id="informations">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="category_name">Name</label>
                                <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Name" value="<?php echo $data['row'][0]->category_name; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="category_id_parent">Parent Category</label>
                                <select class="form-control" name="category_id_parent" id="category_id_parent">
                                    <?php foreach($data['categories'] AS $row): ?>
                                        <option value="<?php echo $row->category_id; ?>" <?php if ($row->category_id == $data['row'][0]->category_id_parent): echo "selected"; endif; ?>><?php echo $row->category_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="category_description">Description</label>
                                <textarea class="form-control tinymce" name="category_description" rows="10"><?php echo $data['row'][0]->category_description; ?></textarea>
                            </div>
                            
                            <input type="hidden" name="token" value="<?php echo $token; ?>" />
                            <p class="text-right"><input class="btn btn-success" type="submit" name="submit" value="Update Category Informations"></p>
                        </form>
                    </div>
                        
                    <div class="tab-pane fade p5" id="seo">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="category_url">Url</label>
                                <input type="text" name="category_url" class="form-control" id="category_url" placeholder="url" value="<?php echo $data['row'][0]->category_url; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="category_title">Title</label>
                                <input type="text" name="category_title" class="form-control" id="category_title" placeholder="Title" value="<?php echo $data['row'][0]->category_title; ?>">
                            </div>

                            <div class="form-group">
                                <label for="category_meta_desc">Meta Description</label>
                                <input type="text" name="category_meta_desc" class="form-control" id="category_meta_desc" placeholder="Meta Description" value="<?php echo $data['row'][0]->category_meta_desc; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="category_meta_robots">Meta Robots</label>
                                <select class="form-control" name="category_meta_robots" id="category_meta_robots">
                                    <option value="1" <?php if($data['row'][0]->category_meta_robots == 1): echo 'selected'; endif; ?>>index, follow</option>
                                    <option value="2" <?php if($data['row'][0]->category_meta_robots == 2): echo 'selected'; endif; ?>>noindex, follow</option>
                                    <option value="3" <?php if($data['row'][0]->category_meta_robots == 3): echo 'selected'; endif; ?>>index, nofollow</option>
                                    <option value="4" <?php if($data['row'][0]->category_meta_robots == 4): echo 'selected'; endif; ?>>noindex, nofollow</option>
                                </select>
                            </div>
                            
                            <input type="hidden" name="token" value="<?php echo $token; ?>" />
                            <p class="text-right"><input class="btn btn-success" type="submit" name="seo" value="Update SEO Informations"></p>
                        </form>  
                    </div>
                    
                    <div class="tab-pane fade p5" id="images">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="category_image">Image</label>
                                <input type="file" class="form-control" id="category_image" name="category_image" value="">
                                <?php
                                    if (!empty($data['row'][0]->category_image)):
                                        echo "<img src=".DIR.$data['row'][0]->category_image." class='img-responsive'>";
                                    endif;
                                ?>
                            </div>
                            
                            <input type="hidden" name="token" value="<?php echo $token; ?>" />
                            <p class="text-right"><input class="btn btn-success" type="submit" name="image" value="Update Image"></p>
                        </form>  
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>