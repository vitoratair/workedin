    <!-- JS Global Compulsory -->
    <script>window.jQuery || document.write('<script src="<?php echo base_url();?>assets/js/libs/jquery-1.8.2.min.js">\x3C/script>')</script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/home/plugins/jquery-migrate-1.2.1.min.js"></script>    
    <script type="text/javascript" src="<?php echo base_url();?>assets/home/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- JS Implementing Plugins -->

    <script type="text/javascript" src="<?php echo base_url();?>assets/home/plugins/counter/waypoints.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/home/plugins/counter/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/home/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>    
    <script type="text/javascript" src="<?php echo base_url();?>assets/home/plugins/revolution-slider/examples-sources/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/home/plugins/revolution-slider/examples-sources/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <!-- load caPortfolio plugin -->

    <!-- JS Page Level-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/home/js/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/home/js/plugins/owl-carousel.js"></script>    
		
	<script src="<?php echo base_url();?>assets/js/libs/jquery.validate.js"></script>
	<script src="<?php echo base_url();?>assets/js/validation.js"></script>	



    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();
            App.initParallaxBg();
            OwlCarousel.initOwlCarousel();   
	        Validation.initValidation();         
        });
    </script>

    <script type="text/javascript">
        var revapi;
        jQuery(document).ready(function() {
           revapi = jQuery('.fullscreenbanner').revolution(
            {
                delay:15000,
                startwidth:1170,
                startheight:500,
                hideThumbs:10,
                fullWidth:"on",
                fullScreen:"on",
                dottedOverlay:"twoxtwo",
                fullScreenOffsetContainer: "",
            });
        });
    </script>

    <script type="text/javascript">
        paceOptions = {
          // Disable the 'elements' source
          elements: false,

          // Only show the progress on regular and ajax-y page navigation,
          // not every request
          restartOnRequestAfter: false
        }
    </script>

    <!--[if lt IE 9]>
        <script src="assets/plugins/respond.js"></script>
        <script src="assets/plugins/html5shiv.js"></script>
    <![endif]-->    
</body>

</html>
