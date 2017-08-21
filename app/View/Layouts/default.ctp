<!DOCTYPE html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    
	<title>American Hearth Bakery</title>
    
    <meta name="description" content="" />
	<meta name="author" content="" />
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!-- **Favicon** -->
    <link href="/images/ahblogosm.jpg" rel="shortcut icon" type="/image/x-icon" />
    
    <!-- **CSS - stylesheets** -->
    <link id="default-css" href="/style.css" rel="stylesheet" media="all" />
    <link id="shortcodes-css" href="/css/shortcodes.css" rel="stylesheet" media="all" />    
    <link id="skin-css" href="/skins/palebrown/style.css" rel="stylesheet" media="all" />
    
    <!--[if lt IE 9]>
        <script src="js/html5.js"></script>
    <![endif]-->
    
    <link href="/css/responsive.css" rel="stylesheet" media="all" />
    <link href="/css/superfish.css" rel="stylesheet" media="all" />
    <link href="/css/slicknav.css" rel="stylesheet" media="all" />    
    
    <!-- **Font Awesome** -->
    <link rel="stylesheet" href="/css/font-awesome.min.css" />
    
    <!-- **Google - Fonts** -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Norican' rel='stylesheet' type='text/css'>
    
    <!-- SLIDER STYLES STARTS -->
	<link rel="stylesheet" type="text/css" href="/js/revolution/settings.css" media="screen" />
    <!-- SLIDER STYLES ENDS -->
    
    <script src="/js/modernizr-2.6.2.min.js"></script>
</head>

<body>
	<!-- main-content div Starts here -->
	<div class="main-content">
        <!-- wrapper div Starts here -->
        <div class="wrapper">
            <!-- top bar div Starts here -->
            <div class="top-bar">
                <div class="container">
                    <div class="float-left">
                        <p><i class=" fa fa-phone"></i>Call : 410-525-3400</p>
                    </div>
                    <div class="float-right">
                        <ul class="cart">
                            <li><a href="/admin"><i class="fa fa-sign-in"></i>Sign in</a> (or) <a href="/admin/users/logout">Logout</a> </li>
                            <li><i class="fa fa-shopping-cart"></i>(0) items in cart | ($0.00)</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- top bar div Ends here -->
            <!-- header div Starts here -->
            <header class="header1">
                <div class="container">
                   <img src="/images/ahblogo.jpg" style="height:150px; margin-left: -200px;">
                    <nav id="main-menu" class="sf-menu" style="margin-top: 25px;">
                        <ul>
                            <li class="menu-item current-page-item"><a href="/">Home</a></li>
                            <li class="menu-item"><a href="/about">About Us</a></li>
                            <li class="menu-item"><a href="/products">View Products</a></li>
                            <li class="menu-item"><a href="/orders/creator">Place an Order</a></li>
                            <li class="menu-item"><a href="/pages/contactus">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header-bottom"></div>
            </header>
            <!-- header div Ends here -->
           
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
            
            <div class="footer-top"><span class="driver-logo"></span></div>
            <footer>
                <div class="container">
                    <div class="dt-sc-one-third column first">
                        <aside class="widget hotel-timing">
                            <h3 class="widgettitle">Ordering Hours</h3>
                            <ul>
                                <li><span class="day"> Ordering by phone closes at 2:30 PM for delivery the next day. </span>  </li>
                            </ul>
                        </aside>
                    </div>
                    <div class="dt-sc-one-third column"></div>
                    <div class="dt-sc-one-third column">
                        <h3 class="widgettitle">Contact Us</h3>
<!--                        <div class="dt-sc-one-half column first">
                            <aside class="widget widget_text">
                                <div id="footer_map"> </div>
								     map was here     
								<div class="wsite-map">
									<iframe allowtransparency="true" frameborder="0" scrolling="no" 
                                    style="
                                    width: 80%;
                                    height:250px;"
                                    src="//www.weebly.com/weebly/apps/generateMap.php?map=google&elementid=607363483902286424&ineditor=0&control=3&width=auto&height=250px&overviewmap=0&scalecontrol=0&typecontrol=0&zoom=15&long=-76.668591&lat=39.272474&domain=www&point=1&align=1&reseller=false">
									</iframe>
								</div>
                            </aside>
                        </div>-->
                        <!--<div class="dt-sc-one-half column">-->
                            <aside class="widget widget_text">
                                <p><span class="fa fa-map-marker"></span><strong>We Deliver To:<br></strong> The Greater Baltimore/Washington Area</p>
                                <p><span class="fa fa-phone"></span><strong>Phone:</strong> 410-525-3400</p>
                                <p><span class="fa fa-envelope"></span><strong>Mail:</strong> <a href="#">info@americanhearthbakery.com</a></p>
                            </aside>
                        <!--</div>-->
                    </div>
                </div>
                <div class="footer-info">
                    <div class="container">
                        <ul class="footer-links">
                            <li><a href="/">Home</a></li>
                            <li><a href="/about">About Us</a></li>
                            <li><a href="/products">View Products</a></li>
                            <li><a href="/orders/creator">Place an Order</a></li>
                            <li><a href="/pages/contactus">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
        <!-- wrapper div Ends here -->
    </div>
    <!-- main-content div Ends here -->
    <!-- Java Scripts -->
    <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="/js/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="/js/jquery-easing-1.3.js"></script>    

	<script type="text/javascript" src="/js/superfish.min.js"></script>
    <script type="text/javascript" src="/js/hoverIntent.js"></script>
    <script type="text/javascript" src="/js/jquery.slicknav.min.js"></script>
    
	<script type="text/javascript" src="/js/jquery.carouFredSel-6.2.1-packed.js"></script>
	<script type="text/javascript" src="/js/jquery.tabs.min.js"></script>
    
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="/js/jquery.gmap.min.js"></script>
    
	<script src="/js/custom.js"></script>
	<script type="text/javascript" src="/js/twitter/jquery.tweet.min.js"></script>
    
	<!-- Revolution Slider Starts -->
    <script src="/js/revolution/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
    
    <script src="/js/jquery.inview.js"></script>
    <script src="/js/jquery.donutchart.js"></script>
    
  
   
     <?php echo $this->fetch('scripts'); ?>
            
    <script type="text/javascript">
	jQuery(document).ready(function($){	
	if($.fn.cssOriginal != undefined)
		$.fn.css = $.fn.cssOriginal;

		var api = $('.fullwidthbanner').revolution(
		{
			delay:9000,
			startwidth:940,
			startheight:640,
	
			onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off
	
			thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
			thumbHeight:50,
			thumbAmount:3,
	
			hideThumbs:200,
			navigationType:"none",				// bullet, thumb, none
			navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none
	
			navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom
	
			navigationHAlign:"center",				// Vertical Align top,center,bottom
			navigationVAlign:"bottom",					// Horizontal Align left,center,right
			navigationHOffset:30,
			navigationVOffset:-40,
	
			soloArrowLeftHalign:"left",
			soloArrowLeftValign:"center",
			soloArrowLeftHOffset:20,
			soloArrowLeftVOffset:0,
	
			soloArrowRightHalign:"right",
			soloArrowRightValign:"center",
			soloArrowRightHOffset:20,
			soloArrowRightVOffset:0,
	
			touchenabled:"on",						// Enable Swipe Function : on/off
	
			stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
			stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic
	
			hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
			hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
			hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value
	
			fullWidth:"on",
	
			shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)
		});	
	});
	</script>
       
    <!-- Revolution Slider Ends -->
    
</body>
</html>
