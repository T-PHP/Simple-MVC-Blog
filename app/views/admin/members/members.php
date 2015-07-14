<?php

use Helpers\Session;

?>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default mtop15">
            <div class="panel-heading">
                <h3 class="panel-title">Members</h3>
                <div class="pull-right mtop-20">
                    <a href="<?php echo DIR;?>admin/members/add" class="btn btn-xs btn-default" title="Add Member"><i class="fa fa-plus"></i></a>
                </div> 
            </div>
            
            <div class="panel-body">
                <?php echo Session::pull('message');?>
                <table class='table table-striped table-hover table-bordered responsive'>
                    <tr>
                        <th>Login</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    if($data['members']){
                        foreach($data['members'] as $row){
                            echo "<tr>";
                            echo "<td>$row->member_username</td>";
                            echo "<td>$row->member_email</td>";
                            echo "<td><a href='".DIR."admin/members/edit/$row->member_id'>Editer</a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>