<?php

use Helpers\Session;

?>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default mtop15">
            <div class="panel-heading">
                <h3 class="panel-title">Categories</h3>
                <div class="pull-right mtop-20">
                    <a href="<?php echo DIR;?>admin/categories/add" class="btn btn-xs btn-default" title="Add Category"><i class="fa fa-plus"></i></a>
                </div> 
            </div>
            
            <div class="panel-body">
                <?php echo Session::message('message');?>
                <table class='table table-striped table-hover table-bordered responsive'>
                    <tr>
                        <th>Category Name</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    if($data['categories']){
                        foreach($data['categories'] as $row){
                            echo "<tr>";
                            echo "<td><a href='".DIR."admin/categories/$row->category_id'>$row->category_name</a></td>";
                            echo "<td>$row->category_url</td>";
                            echo "<td>
                                    <a href='".DIR."admin/categories/edit/$row->category_id' class='btn btn-xs btn-primary'>
                                        <i class='fa fa-pencil'></i>
                                    </a>
                                    <a href='".DIR."admin/categories/$row->category_id' class='btn btn-xs btn-primary'>
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