<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container-fluid">
			<div class="row-fluid">
				<h1><?php echo $data['post']['0']->post_name; ?></h1>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	 
	<!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container-fluid mtb">
	 	<div class="row-fluid">
            
	 		<! -- SINGLE POST -->
	 		<div class="column_center col-lg-8">
	 			<! -- Blog Post 1 -->
                <?php if(!empty($data['post']['0']->post_image)): ?>
		 	        <p>
                       <img class="img-responsive" src="<?php echo IMG_POSTS.''.$data['post']['0']->post_id.'/m-'.$data['post']['0']->post_image; ?>">
                    </p>
		 		<?php endif; ?>
                
                <?php echo $data['post']['0']->post_long_description; ?>
                
		 		<div class="spacing"></div>
		 		<h6>SHARE:</h6>
		 		<p class="share">
		 			<a href="#"><i class="fa fa-twitter"></i></a>
		 			<a href="#"><i class="fa fa-facebook"></i></a>
		 			<a href="#"><i class="fa fa-tumblr"></i></a>
		 			<a href="#"><i class="fa fa-google-plus"></i></a>		 		
		 		</p>
		 		
			</div><! --/col-lg-8 -->