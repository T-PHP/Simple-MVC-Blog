<?php

use Helpers\Assets;
use Helpers\Url;
use Helpers\Hooks;

//initialise hooks
$hooks = Hooks::get();
?>
    
    <div class="col-lg-4">
       <?php $hooks->run('column_right'); ?>
    </div>
 </div><! --/container -->
</div><! --/row -->
	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	 <div id="footerwrap">
	 	<div class="container-fluid">
		 	<div class="row-fluid">
		 		<div class="col-lg-4">
		 			<h4>About</h4>
		 			<div class="hline-w"></div>
		 			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Social Links</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				<a href="#"><i class="fa fa-dribbble"></i></a>
		 				<a href="#"><i class="fa fa-facebook"></i></a>
		 				<a href="#"><i class="fa fa-twitter"></i></a>
		 				<a href="#"><i class="fa fa-instagram"></i></a>
		 				<a href="#"><i class="fa fa-tumblr"></i></a>
		 			</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Our Bunker</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				Some Ave, 987,<br/>
		 				23890, New York,<br/>
		 				United States.<br/>
		 			</p>
		 		</div>
		 	
		 	</div><! --/row -->
	 	</div><! --/container -->
	 </div><! --/footerwrap -->
	 

    <!-- JS -->
    <?php
    Assets::js(array(
        '//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js',
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', 
         Url::templatePath() . 'js/retina-1.1.0.js',
         Url::templatePath() . 'js/jquery.hoverdir.js',
         Url::templatePath() . 'js/jquery.hoverex.min.js',
         Url::templatePath() . 'js/jquery.prettyPhoto.js',
         Url::templatePath() . 'js/jquery.isotope.min.js',
         Url::templatePath() . 'js/custom.js',
        Url::templatePath() . 'js/modernizr.js'
    ));

    //hook for plugging in javascript
    $hooks->run('js');

    //hook for plugging in code into the footer
    $hooks->run('footer');
    ?>
 
    <script>
        // Portfolio
        (function($) {
            "use strict";
            var $container = $('.portfolio'),
                $items = $container.find('.portfolio-item'),
                portfolioLayout = 'fitRows';

                if( $container.hasClass('portfolio-centered') ) {
                    portfolioLayout = 'masonry';
                }

                $container.isotope({
                    filter: '*',
                    animationEngine: 'best-available',
                    layoutMode: portfolioLayout,
                    animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                },
                masonry: {
                }
                }, refreshWaypoints());

                function refreshWaypoints() {
                    setTimeout(function() {
                    }, 1000);   
                }

                $('nav.portfolio-filter ul a').on('click', function() {
                        var selector = $(this).attr('data-filter');
                        $container.isotope({ filter: selector }, refreshWaypoints());
                        $('nav.portfolio-filter ul a').removeClass('active');
                        $(this).addClass('active');
                        return false;
                });

                function getColumnNumber() { 
                    var winWidth = $(window).width(), 
                    columnNumber = 1;

                    if (winWidth > 1200) {
                        columnNumber = 5;
                    } else if (winWidth > 950) {
                        columnNumber = 4;
                    } else if (winWidth > 600) {
                        columnNumber = 3;
                    } else if (winWidth > 400) {
                        columnNumber = 2;
                    } else if (winWidth > 250) {
                        columnNumber = 1;
                    }
                        return columnNumber;
                    }       

                    function setColumns() {
                        var winWidth = $(window).width(), 
                        columnNumber = getColumnNumber(), 
                        itemWidth = Math.floor(winWidth / columnNumber);

                        $container.find('.portfolio-item').each(function() { 
                            $(this).css( { 
                            width : itemWidth + 'px' 
                        });
                    });
                }

                function setPortfolio() { 
                    setColumns();
                    $container.isotope('reLayout');
                }

                $container.imagesLoaded(function () { 
                    setPortfolio();
                });

                $(window).on('resize', function () { 
                setPortfolio();          
            });
        })(jQuery);
    </script>
  </body>
</html>