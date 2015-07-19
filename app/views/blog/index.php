
<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container-fluid">
			<div class="row-fluid">
				<h1>Blog List.</h1>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	 <div class="container-fluid mtb">
	 	<div class="row-fluid">
	 	     
	 		<! -- BLOG POSTS LIST -->
	 		<div class="column_center col-lg-8">
                <?php
                    if($data['posts']):
                        foreach($data['posts'] as $row):
                ?>
                            <?php if(!empty($row->post_image)): ?>
                                <p>
                                    <a href="<?php echo DIR.'p'.$row->post_id.'-'.$row->post_url ?>.html" title="<?php echo $row->post_name; ?>">
                            <img class="img-responsive" src="<?php echo IMG_POSTS.''.$row->post_id.'/m-'.$row->post_image; ?>" />
                                    </a>
                                </p>
                            <?php endif; ?>
                            <a href="<?php echo DIR.'p'.$row->post_id.'-'.$row->post_url ?>.html" title="<?php echo $row->post_name; ?>">
                                <h2 class="ctitle">
                                    <?php echo $row->post_name; ?>
                                </h2>
                            </a>
                            <p><csmall>Posted: <?php echo $row->post_created; ?></csmall> | <csmall2>By: <?php echo $row->member_username; ?></csmall2></p>
                           <?php echo $row->post_short_description; ?> 
                            <p class="text-right"><a class="btn btn-primary" rel="nofollow" href="<?php echo DIR.'p'.$row->post_id.'-'.$row->post_url ?>.html" title="<?php echo $row->post_name; ?>">Read More...</a></p>
                            <div class="hline"></div>

                            <div class="spacing"></div>
                
                <?php
                        endforeach;
                    endif;
                ?>
		 		<div class='clearfix'></div>
                <div class="pull-right"><?php echo $data['pageLinks']; ?></div> 
			</div><! --/col-lg-8 -->
	