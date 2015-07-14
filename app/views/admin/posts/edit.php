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
                <h3 class="panel-title">Edit post <?php echo $data['row'][0]->post_name; ?></h3>
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
                                <label for="post_name">Name</label>
                                <input type="text" name="post_name" class="form-control" id="post_name" placeholder="Name" value="<?php echo $data['row'][0]->post_name; ?>">
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
                                <textarea class="form-control tinymce" name="post_short_description" rows="10"><?php echo $data['row'][0]->post_short_description; ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="post_long_description">Long Description</label>
                                <textarea class="form-control tinymce" name="post_long_description" rows="10"><?php echo $data['row'][0]->post_long_description; ?></textarea>
                            </div>
                            
                            <input type="hidden" name="token" value="<?php echo $token; ?>" />
                            <p class="text-right"><input class="btn btn-success" type="submit" name="submit" value="Update Post Informations"></p>
                        </form>
                    </div>
                        
                    <div class="tab-pane fade p5" id="seo">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="post_url">Url</label>
                                <input type="text" name="post_url" class="form-control" id="post_url" placeholder="url" value="<?php echo $data['row'][0]->post_url; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="post_title">Title</label>
                                <input type="text" name="post_title" class="form-control" id="post_title" placeholder="Title" value="<?php echo $data['row'][0]->post_title; ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_meta_description">Meta Description</label>
                                <input type="text" name="post_meta_description" class="form-control" id="post_meta_description" placeholder="Meta Description" value="<?php echo $data['row'][0]->post_meta_description; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="post_meta_robots">Meta Robots</label>
                                <select class="form-control" name="post_meta_robots" id="post_meta_robots">
                                    <option value="1" <?php if($data['row'][0]->post_meta_robots == 1): echo 'selected'; endif; ?>>index, follow</option>
                                    <option value="2" <?php if($data['row'][0]->post_meta_robots == 2): echo 'selected'; endif; ?>>noindex, follow</option>
                                    <option value="3" <?php if($data['row'][0]->post_meta_robots == 3): echo 'selected'; endif; ?>>index, nofollow</option>
                                    <option value="4" <?php if($data['row'][0]->post_meta_robots == 4): echo 'selected'; endif; ?>>noindex, nofollow</option>
                                </select>
                            </div>
                            
                            <input type="hidden" name="token" value="<?php echo $token; ?>" />
                            <p class="text-right"><input class="btn btn-success" type="submit" name="seo" value="Update SEO Informations"></p>
                        </form>  
                    </div>
                    
                    <div class="tab-pane fade p5" id="images">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="post_image">Image</label>
                                <input type="file" class="form-control" id="post_image" name="post_image" value="">
                                <?php
                                    if (!empty($data['row'][0]->post_image)):
                                        echo "<img src=".DIR.IMG_POSTS.''.$data['row']['0']->post_id.'/m-'.$data['row']['0']->post_image." class='img-responsive'>";
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