<?php

use Helpers\Session;

?>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default mtop15">
            <div class="panel-heading">
                <h3 class="panel-title">Posts</h3>
                <div class="pull-right mtop-20">
                    <a href="<?php echo DIR;?>admin/posts/add" class="btn btn-xs btn-default" title="Add Post"><i class="fa fa-plus"></i></a>
                </div> 
            </div>
            
            <div class="panel-body">
                <?php echo Session::message('message');?>
                <table class='table table-striped table-hover table-bordered responsive'>
                    <tr>
                        <th>Post Name</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    if($data['posts']){
                        foreach($data['posts'] as $row){
                            echo "<tr>";
                            echo "<td>$row->post_name</td>";
                            echo "<td>$row->post_url</td>";
                            echo "<td>
                                    <a href='".DIR."admin/posts/edit/$row->post_id' class='btn btn-xs btn-primary'>
                                        <i class='fa fa-pencil'></i>
                                    </a>
                                    <a href='".DIR."admin/posts/$row->post_id' class='btn btn-xs btn-primary'>
                                        <i class='fa fa-eye'></i>
                                    </a>
                                </td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>