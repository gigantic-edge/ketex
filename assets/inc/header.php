
<!--
    	<div class="preloader">
		<div class="content">
			<div class="loader-circle"></div>
			<div class="loader-line-mask one">
				<div class="loader-line"><img class="img-fluid" src="assets/img/loader.gif"></div>
			</div>
			<div class="loader-line-mask two">
				<div class="loader-line"></div>
			</div>
		</div>
	</div>
-->


<?php

// session_start();

require_once("db/config.php");

$database = new Database();
$conn = $database->connect();

require_once("ketex_admin/class/profile.php");
$profile = new profile($conn);
$allsearch1arr = $profile->allProfilelist();

$publickey = "6LdYoqkeAAAAAMZxIy5pqmKcvIyvDl7J62B-SWpW"; // you got this from the signup page
?>
                                            



<link rel="icon" type="image/png" href="assets/img/favicon.png" />

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


<style>
:root {
    --primaryColor: #ff6600;
    --secondaryColor: #0185da;
    --trirdColor: #efefef;
    --textColor: #242424;
}
</style>

<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
<link rel="stylesheet" type="text/css" href="assets/scss/style.scss">

<!------------GOOGLE FONT------------>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">

<!------------ZMDI ICON------------>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<!------------OWL------------>
<link rel="stylesheet" href="assets/owl/owl3.css">
<!------------AOS ANIMATION------------>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!------------FANCYBOX------------>
  <link href="assets/fancybox/jquery.fancybox.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    
     
<div class="preloader">
	<div class="dots-loader"></div>
</div>
    <!--<div class="dots-loader"></div>-->
    <?php $pagename = basename($_SERVER['PHP_SELF']); ?>
    <!-- ********|| HEADER START ||******** -->
    <header class="header">
        <div class="top-header">
            <div class="container">
                <div class="left-part">
                    <div class="item-title">Welcome to Amer-Sil Ketex Private Limited</div>
                </div>
                <div class="social">
                    <ul class="social-menu">
                        <li><a href="https://www.facebook.com/Ketextechnicaltextile" class="fb" target="_blank" ><i class="zmdi zmdi-facebook"></i></a></li>
                        <li><a href="https://twitter.com/KetexSil" class="twitter" target="_blank" ><i class="zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#" class="linkedin"><i class="zmdi zmdi-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="topPanel">
            <div class="container">
                <div class="nav-inner">
                    <div class="logo-box">
                    <div class="brand">
                        <a href="<?php echo $database->base_url; ?>" class="logo">
                            <img class="img-fluid" src="assets/img/Ketex-logo-01.svg" alt="" title="Home">
                        </a>
                    </div>
                    <div class="script-bar">
                    <script language="JavaScript" src="https://dunsregistered.dnb.com" type="text/javascript"></script>
                    </div>
                   <div class="dnb">
                        <a href="http://discovery.ariba.com/profile/AN11126277489" target="_blank">
<img alt="View AMER-SIL KETEX PRIVATE LIMITED profile on Ariba Discovery" border=0 src="https://service.ariba.com/an/p/Ariba/badge_180x55.jpg">
</a>
                         <!--<p>DUNS 677574738</p>-->
                    </div>
                    </div>
                   

                     

                    
                    <div class="nav-info">
                        <nav class="navbar navbar-expand-xl navbar-light">
                            <!--
              <a class="navbar-brand" href="<?php echo $database->base_url; ?>">
                  <img src="<?php echo $database->base_url; ?>images/logo.svg" alt="" class="logo img-fluid">
                </a>
-->
                            <button class="navbar-toggler x collapsed" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <!--                <span class="navbar-toggler-icon"></span>-->
                                <i class="zmdi zmdi-menu"></i>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse h-md-100" id="navbarSupportedContent">
                                <ul class="navbar-nav m-auto text-uppercase h-md-100" id="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $database->base_url; ?>">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $database->base_url; ?>about_us.php">About
                                            Us</a>
                                    </li>
                        

                                    <li class="nav-item dropdown <?=($pagename == 'product_listing.php')?'active':''?>">
                                        <a class="nav-link dropdown-toggle"
                                            href="<?php echo $database->base_url; ?>product_listing.php" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Products
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="seviceDropdownLink">

                                            <?php foreach ($allsearch1arr as $k => $v): ?>
                                            <li class="dropdown-submenu">
                                                <a class="dropdown-item"
                                                    href="<?php echo $database->base_url; ?>product_listing.php?ID=<?php echo $v['cat_id'] ?>"><?php echo $v['cat_name'] ?></a>
                                            </li>
                                            <?php
                                endforeach;
                            ?>
                                        </ul>


                                    </li>

                                     <li class="nav-item">
                                        <a class="nav-link"
                                            href="<?php echo $database->base_url; ?>development.php">Developments</a>
                                    </li>
                                    <!--<li class="nav-item">
                                        <a class="nav-link"
                                            href="<?php echo $database->base_url; ?>application.php">Application</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $database->base_url; ?>contact_us.php">Contact
                                            Us</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $database->base_url; ?>notice_board.php">Notice
                                            Board</a>
                                    </li> -->
                                </ul>

                            </div>
                        </nav>
                        <div class="hearder-options">
                            <div class="user-options">
                                <div class="search-icon">
                                    <a href="javascript:void(0)" class="search-btn"><i class="zmdi zmdi-search"></i></a>
                                </div>
                                <div class="search-wrap">
                                    <div class="search">
                                        <div class="close-action">
                                            <a href="javascript:void(0)" class="close-btn"><i
                                                    class="zmdi zmdi-close"></i></a>
                                        </div>
                                        <form action="product_search.php" class="search-input" method="post">
                                            <input class="form-control" type="search" placeholder="Search"
                                                name="keyword" value="" id="mySearch" required>
                                            <button class="btn-search" type="submit">Search</button>
                                        </form>
                                        <div id="search_display"></div>
                                        <?php /*<div class="search_ajaxdetails">
                                        	<div class="is-ajax-search-posts">
                                            
                                            <?php 
                                            $sql ="SELECT * FROM `product_details` where `pro_name` != ''";
                                            $query2 = $conn->query($sql);
                                            $productSearchData = $query2->fetchAll(PDO::FETCH_ASSOC); 
                                            
                                            foreach ($productSearchData as $product){ 
                                            
                                            $sql ="SELECT * FROM `product_image` WHERE `pro_id` = '". $product['pro_id']."' && `image_position` = '1' ";
                                            $query2 = $conn->query($sql);
                                            $proImageData = $query2->fetch(PDO::FETCH_LAZY);     
                                            
                                            $sql ="SELECT * FROM `product_category` WHERE `cat_id` = '". $product['cat_id']."' ";
                                            $query2 = $conn->query($sql);
                                            $proCatData = $query2->fetch(PDO::FETCH_LAZY);     
                                            
                                            ?>
                                            	<div class="is-items-search-post is-product">
                                                	<div class="is-search-sections">
                                                    	<div class="left-section">
                                                        	<div class="thumbimg">
                                                            	<a href="/#">
                                                                    <img class="img-fluid" src="<?php echo $database->base_url . $database->document_path_site_image . $proImageData['product_img']; ?>" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="right-section">
                                                        	<div class="is-title">
                       	 										<a href="#/"><?php echo $product['pro_name'];?></a>
                                                             </div>
                                                             <div class="meta">
                                                              <span class="is-meta-category"> <i>Categories:</i> <span class="is-cat-links"> <a href="#" rel="tag"><?php echo $proCatData['cat_name'];?></a> </span> </span> 
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                
                                                <!--<div class="is-items-search-post is-product">
                                                	<div class="is-search-sections">
                                                    	<div class="left-section">
                                                        	<div class="thumbimg">
                                                            	<a href="/#">
                                                                    <img class="img-fluid" src="assets/img/search/seac6.jpg" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="right-section">
                                                        	<div class="is-title">
                       	 										<a href="#/">POLYESTER AIR SLIDE FABRIC</a>
                                                             </div>
                                                             <div class="meta">
                                                                <div class="search_price"> 
                                                                  <span class="is-prices"> 
                                                                        <del><span class="amount"><span class="Price-currencySymbol">₹</span>250</span></del>&nbsp;
                                                                        <ins><span class="amount"><span class="Price-currencySymbol">₹</span>225</span></ins> 
                                                                  </span> 
                                                              </div>
                                                              
                                                              <span class="meta-date"> 
                                                                <span class="posted-on">
                                                                    <time class="entry-date">December 18, 2020</time>
                                                                </span> 
                                                              </span>   
                                                              
                                                              <span class="is-meta-category"> <i>Categories:</i> <span class="is-cat-links"> <a href="#" rel="tag">Stories / Novel</a> </span> </span> 
                                                            </div>
                                                            
                                                            <div class="addto_cart">
                                                                <a href="#">Add to Cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>--->
                                            </div>
                                        </div>
                                        */ ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <!-- ********|| HEADER ENDS ||******** -->

    <!-- ********|| NAV STARTS ||******** -->
    <!--
      <section class="topPanel">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-xl navbar-light">
              <a class="navbar-brand" href="<?php echo $database->base_url; ?>">
                  <img src="<?php echo $database->base_url; ?>images/logo.svg" alt="" class="logo img-fluid">
                </a>
              <button class="navbar-toggler x collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                  <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
              </button>

              <div class="collapse navbar-collapse h-md-100" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto text-uppercase h-md-100" id="nav">
                  <li class="nav-item">
                    <a class="nav-link" href="https://keylines.net.in/dev/ketex-html/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                  </li>
                    <li class="nav-item dropdown">
        
                            <a class="ser" href="https://keylines.net.in/dev/ketex-html/product.php">Products</a>
                        <a class="nav-link dropdown-toggle" href="https://keylines.net.in/dev/ketex-html/product.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                        
                            <div class="dropdown-menu dropdown-style" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 44px, 0px);">
                              <a class="dropdown-item" href="#">Pluri Tubular Bags (Gauntlets)</a>
                              <a class="dropdown-item" href="#">Technical Textiles</a>
                              <a class="dropdown-item" href="#">Fiberglass Fabrics</a>
                              <a class="dropdown-item" href="#">Texturised Yarn, Ropes, Gasket</a>
                              <a class="dropdown-item" href="#">Seperators</a>
                              <a class="dropdown-item" href="#">Plastic Component</a>
                            </div>
                          </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Developments</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="https://keylines.net.in/dev/ketex-html/application.php">Application</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="https://keylines.net.in/dev/ketex-html/contact_us.php">Contact Us</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="#">Notice Board</a>
                  </li> 
                </ul>
                 
              </div>
            </nav>

        </div>
    </div>
</section>
-->
    <!-- ********|| NAV ENDS ||******** -->