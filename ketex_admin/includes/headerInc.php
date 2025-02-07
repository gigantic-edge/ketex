<!-- end::Head -->

<!-- begin::Body -->
<?php
include_once("class/order.php");
$order2 = new order($conn);
//$countarr = $order2->quotationcount();
//$countinqarr = $order2->notificationcount();
?>
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
<body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default" style="background-color: #f2f3f8;">

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <!-- begin::Header -->
        <header id="m_header" class="m-grid__item m-header " m-minimize="minimize" m-minimize-offset="200" m-minimize-mobile-offset="200">
            <div class="m-header__top">
                <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
                    <div class="m-stack m-stack--ver m-stack--desktop">

                        <!-- begin::Brand -->
                        <div class="m-stack__item m-brand">
                            <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                                <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                    <a href="dashboard.php" class="m-brand__logo-wrapper">
                                      
                                        <img alt="" src="<?php echo $database->base_url; ?>images/logo.svg" style="height: 70px;"/>
                                    </a>
                                </div>
                                <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push" m-dropdown-toggle="click" aria-expanded="true">


                                    </div>

                                    <!-- begin::Responsive Header Menu Toggler-->
                                    <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>

                                    <!-- end::Responsive Header Menu Toggler-->

                                    <!-- begin::Topbar Toggler-->
                                    <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                        <i class="flaticon-more"></i>
                                    </a>

                                    <!--end::Topbar Toggler-->
                                </div>
                            </div>
                        </div>

                        <!-- end::Brand -->

                        <!-- begin::Topbar -->
                        <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                            <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-topbar__nav-wrapper">
                                    <ul class="m-topbar__nav m-nav m-nav--inline">
                                        <li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center  m-dropdown--mobile-full-width" m-dropdown-toggle="click"
                                            m-dropdown-persistent="1">


                                        </li>
                                        
                                        
                                        
                                   
                                        
                                        
                                     
                                        
                                        
                                        
                                        <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                            m-dropdown-toggle="click">
                                            
                                            
                                          <a href="#" class="m-nav__link m-dropdown__toggle">
                                                <span class="m-topbar__welcome"><h4>ADMIN</h4></span>

                                            </a>



                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- end::Topbar -->
                    </div>
                </div>
            </div>
            <div class="m-header__bottom">
                <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
                    <div class="m-stack m-stack--ver m-stack--desktop">





                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
 <div class="container-fluid">
  
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main_nav">
    <ul class="navbar-nav">
        <li class="nav-item active">  <a href="dashboard.php" class="nav-link">Dashboard</a>  </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="">  </a>
            
        </li> -->
        <!-- <li class="nav-item"><a class="nav-link" href="">  </a></li> -->
        <li class="nav-item dropdown">
           <a class="nav-link  dropdown-toggle" href="product_multipleimg.php" data-bs-toggle="dropdown"> Product </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="profile.php"> Product Category</a></li>
              <li><a class="dropdown-item" href="product_details.php"> Product Details </a></li>
              
            </ul>
        </li>

        <li class="nav-item dropdown">
           <a class="nav-link  dropdown-toggle" href="product_multipleimg.php" data-bs-toggle="dropdown"> Employee </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="employee_details.php"> Employee department</a></li>
              <li><a class="dropdown-item" href="employee_department_details.php"> Employee department details </a></li>
              
            </ul>
        </li>

        <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="cms_management.php" data-bs-toggle="dropdown" >CMS Management System</a>
           <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="cms_management.php"> Pages</a></li>
                <li><a class="dropdown-item" href="notice_a.php"> Notice Board </a></li>
                <li><a class="dropdown-item" href="awords_a.php"> Awords </a></li>
                <li><a class="dropdown-item" href="enquiry_a.php"> Product Enquiry </a></li>
                <li><a class="dropdown-item" href="enquiry_all.php"> All Enquiry </a></li>
                <li><a class="dropdown-item" href="branchesList.php"> Branch List </a></li>
                <li><a class="dropdown-item" href="journeyList.php"> Journey List </a></li>
              
            </ul>
        </li>

        

        <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="application.php" data-bs-toggle="dropdown" >Application</a>
           <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="application_category_a.php"> Application Category</a></li>
                <li><a class="dropdown-item" href="application_details_a.php"> Application Details </a></li>
              
            </ul>
        </li>
        
    </ul>
  </div> <!-- navbar-collapse.// -->
 </div> <!-- container-fluid.// -->
</nav>


                        
                        <!-- end::Horizontal Menu -->

                        <!--begin::Search-->
                        <div class="m-stack__item m-stack__item--middle m-dropdown m-dropdown--arrow m-dropdown--large m-dropdown--mobile-full-width m-dropdown--align-right m-dropdown--skin-light m-header-search m-header-search--expandable m-header-search--skin-" id="m_quicksearch"
                             m-quicksearch-mode="default">

                            <!--begin::Search Form -->
<!--                            <form class="m-header-search__form">
                                <div class="m-header-search__wrapper">
                                    <span class="m-header-search__icon-search" id="m_quicksearch_search">
                                        <i class="la la-search"></i>
                                    </span>
                                    <span class="m-header-search__input-wrapper">
                                        <input autocomplete="off" type="text" name="q" class="m-header-search__input" value="" placeholder="Search..." id="m_quicksearch_input">
                                    </span>
                                    <span class="m-header-search__icon-close" id="m_quicksearch_close">
                                        <i class="la la-remove"></i>
                                    </span>
                                    <span class="m-header-search__icon-cancel" id="m_quicksearch_cancel">
                                        <i class="la la-remove"></i>
                                    </span>
                                </div>
                            </form>-->

                            <!--end::Search Form -->

                            <!--begin::Search Results -->
                            <div class="m-dropdown__wrapper">
                                <div class="m-dropdown__arrow m-dropdown__arrow--center"></div>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-height="300" data-mobile-height="200">
                                            <div class="m-dropdown__content m-list-search m-list-search--skin-light">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::Search Results -->
                        </div>

                        <!--end::Search-->
                    </div>
                </div>
            </div>
        </header>
        <style type="text/css">
/* ============ desktop view ============ */
@media all and (min-width: 992px) {
    .navbar .nav-item .dropdown-menu{ display: none; }
    .navbar .nav-item:hover .nav-link{   }
    .navbar .nav-item:hover .dropdown-menu{ display: block; }
    .navbar .nav-item .dropdown-menu{ margin-top:0; }
}   
/* ============ desktop view .end// ============ */
</style>
