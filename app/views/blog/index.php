<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h1>Blog List.</h1>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

<!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container mtb">
	 	<div class="row">
	 	
	 		<! -- BLOG POSTS LIST -->
	 		<div class="col-lg-8">
                
                <?php
                    if($data['posts']):
                        foreach($data['posts'] as $row):
                ?>
                            <?php if(!empty($row->post_image)): ?>
                                <p>
                                    <img class="img-responsive" src="<?php echo IMG_POSTS.''.$row->post_id.'/m-'.$row->post_image; ?>"
                                </p>
                            <?php endif; ?>
                            <a href="<?php echo DIR.'p'.$row->post_id.'-'.$row->post_url ?>.html">
                                <h3 class="ctitle">
                                    <?php echo $row->post_name; ?>
                                </h3>
                            </a>
                            <p><csmall>Posted: <?php echo $row->post_created; ?></csmall> | <csmall2>By: <?php echo $row->member_username; ?></csmall2></p>
                           <?php echo $row->post_short_description; ?> 
                            <p class="text-right"><a rel="nofollow" href="<?php echo DIR.'p'.$row->post_id.'-'.$row->post_url ?>.html" title="<?php echo $row->post_name; ?>">[Read More...]</a></p>
                            <div class="hline"></div>

                            <div class="spacing"></div>
                
                <?php
                        endforeach;
                    endif;
                ?>
                
		 		
			</div><! --/col-lg-8 -->
	 		
	 		
	 		<! -- SIDEBAR -->
	 		<div class="col-lg-4">
		 		<h4>Search</h4>
		 		<div class="hline"></div>
		 			<p>
		 				<br/>
		 				<input type="text" class="form-control" placeholder="Search something">
		 			</p>
		 			
		 		<div class="spacing"></div>
		 		
		 		<h4>Categories</h4>
		 		<div class="hline"></div>
			 		<p><a href="#"><i class="fa fa-angle-right"></i> Wordpress</a> <span class="badge badge-theme pull-right">9</span></p>
			 		<p><a href="#"><i class="fa fa-angle-right"></i> Photoshop</a> <span class="badge badge-theme pull-right">3</span></p>
			 		<p><a href="#"><i class="fa fa-angle-right"></i> Web Design</a> <span class="badge badge-theme pull-right">11</span></p>
			 		<p><a href="#"><i class="fa fa-angle-right"></i> Development</a> <span class="badge badge-theme pull-right">5</span></p>
			 		<p><a href="#"><i class="fa fa-angle-right"></i> Tips & Tricks</a> <span class="badge badge-theme pull-right">7</span></p>
			 		<p><a href="#"><i class="fa fa-angle-right"></i> Code Snippets</a> <span class="badge badge-theme pull-right">12</span></p>

		 		<div class="spacing"></div>
		 		
		 		<h4>Recent Posts</h4>
		 		<div class="hline"></div>
					<ul class="popular-posts">
		                <li>
		                    <a href="#"><img src="assets/img/thumb01.jpg" alt="Popular Post"></a>
		                    <p><a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></p>
		                    <em>Posted on 02/21/14</em>
		                </li>
		                <li>
		                    <a href="#"><img src="assets/img/thumb02.jpg" alt="Popular Post"></a>
		                    <p><a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></p>
		                    <em>Posted on 03/01/14</em>
		                <li>
		                    <a href="#"><img src="assets/img/thumb03.jpg" alt="Popular Post"></a>
		                    <p><a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></p>
		                    <em>Posted on 05/16/14</em>
		                </li>
		                <li>
		                    <a href="#"><img src="assets/img/thumb04.jpg" alt="Popular Post"></a>
		                    <p><a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></p>
		                    <em>Posted on 05/16/14</em>
		                </li>
		            </ul>
		            
		 		<div class="spacing"></div>
		 		
		 		<h4>Popular Tags</h4>
		 		<div class="hline"></div>
		 			<p>
		            	<a class="btn btn-theme" href="#" role="button">Design</a>
		            	<a class="btn btn-theme" href="#" role="button">Wordpress</a>
		            	<a class="btn btn-theme" href="#" role="button">Flat</a>
		            	<a class="btn btn-theme" href="#" role="button">Modern</a>
		            	<a class="btn btn-theme" href="#" role="button">Wallpaper</a>
		            	<a class="btn btn-theme" href="#" role="button">HTML5</a>
		            	<a class="btn btn-theme" href="#" role="button">Pre-processor</a>
		            	<a class="btn btn-theme" href="#" role="button">Developer</a>
		            	<a class="btn btn-theme" href="#" role="button">Windows</a>
		            	<a class="btn btn-theme" href="#" role="button">Phothosop</a>
		            	<a class="btn btn-theme" href="#" role="button">UX</a>
		            	<a class="btn btn-theme" href="#" role="button">Interface</a>		            	
		            	<a class="btn btn-theme" href="#" role="button">UI</a>		            	
		            	<a class="btn btn-theme" href="#" role="button">Blog</a>		            	
		 			</p>
	 		</div>
	 	</div><! --/row -->
	 </div><! --/container -->