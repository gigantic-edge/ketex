<?php session_start();
include_once('conn.php');

@$sql ="SELECT * FROM `admin_master` WHERE `am_id` = '".$loginMemberID."' ";
@$query2 = $conn->query($sql);
@$userData = $query2->fetch(PDO::FETCH_LAZY);

?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ketex Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/sidemenu.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="dist/css/genealogy.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		<!-- favicon -->		
	<link rel="shortcut icon" href="../assets/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper" style="height: auto; min-height: 100%;">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>KAP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><!--<img src="dist/img/force.png" class="img-responsive">-->Ketex Admin Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="logout.php">
              <!--<i class="fa-2x fa fa-sign-out" aria-hidden="true"></i>-->
              <img src="https://icon-library.com/images/dc3fceb69e.png" style="max-width: 100%;" class="img-responsive">
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'index.php' || basename($_SERVER['REQUEST_URI']) == ''){ echo 'active'; } ?>">
          <a href="index.php"><i class="fa fa-dashcube"></i> <span>Dashbord</span></a>
        </li>
        <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'productCategory.php' || basename($_SERVER['REQUEST_URI']) == 'productList.php'
        || basename($_SERVER['REQUEST_URI']) == 'addProduct.php'){ echo 'active'; } ?> treeview">
        <a href="#"><i class="fa fa-product-hunt"></i> <span>Product</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'productCategory.php'){ echo 'active'; } ?>"><a href="productCategory.php">Product Category</a></li>
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'productList.php' || basename($_SERVER['REQUEST_URI']) =='addProduct.php'){ echo 'active'; } ?>"><a href="productList.php">Product List</a></li>
        </ul>
      </li>
      <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'empDepartment.php' || basename($_SERVER['REQUEST_URI']) == 'employeeList.php'){ echo 'active'; } ?> treeview">
        <a href="#"><i class="fa fa-user-circle"></i> <span>Employee</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'empDepartment.php'){ echo 'active'; } ?>"><a href="empDepartment.php">Employee Department</a></li>
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'employeeList.php'){ echo 'active'; } ?>"><a href="employeeList.php">Employee List</a></li>
        </ul>
      </li>
      <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'cmsPages.php' || basename($_SERVER['REQUEST_URI']) == 'noticeBoard.php' || basename($_SERVER['REQUEST_URI']) == 'award.php'|| 
      basename($_SERVER['REQUEST_URI']) == 'branch.php' || basename($_SERVER['REQUEST_URI']) == 'journey.php'){ echo 'active'; } ?> treeview">
        <a href="#"><i class="fa fa-file-text"></i> <span>CMS</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'cmsPages.php'){ echo 'active'; } ?>"><a href="cmsPages.php">CMS Pages</a></li>
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'noticeBoard.php'){ echo 'active'; } ?>"><a href="noticeBoard.php">Notice Board</a></li>
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'award.php'){ echo 'active'; } ?>"><a href="award.php">Award</a></li>
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'client.php'){ echo 'active'; } ?>"><a href="client.php">Clients</a></li>
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'branch.php'){ echo 'active'; } ?>"><a href="branch.php">Branch</a></li>
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'journey.php'){ echo 'active'; } ?>"><a href="journey.php">Journey</a></li>
        </ul>
      </li>
      
      <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'productEnquiry.php' || basename($_SERVER['REQUEST_URI']) == 'allEnquiry.php'){ echo 'active'; } ?> treeview">
        <a href="#"><i class="fa fa-line-chart"></i> <span>Enquiry</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'productEnquiry.php'){ echo 'active'; } ?>"><a href="productEnquiry.php">Product Enquiry</a></li>
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'allEnquiry.php'){ echo 'active'; } ?>"><a href="allEnquiry.php">All Enquiry</a></li>
        </ul>
      </li>
      
      <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'applicationCategory.php' || basename($_SERVER['REQUEST_URI']) == 'applicationList.php'){ echo 'active'; } ?> treeview">
        <a href="#"><i class="fa fa-area-chart"></i> <span>Application</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'applicationCategory.php'){ echo 'active'; } ?>"><a href="applicationCategory.php">Application Category</a></li>
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'applicationList.php'){ echo 'active'; } ?>"><a href="applicationList.php">Application List</a></li>
        </ul>
      </li>
      
      
       <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'joblisting.php' || basename($_SERVER['REQUEST_URI']) == 'form.php'){ echo 'active'; } ?> treeview">
        <a href="#"><i class="fa fa-drivers-license"></i> <span>Career</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'joblisting.php'){ echo 'active'; } ?>"><a href="joblisting.php">Job Opening</a></li>
          <li class="<?php if(basename($_SERVER['REQUEST_URI']) == 'jobEnquiry.php'){ echo 'active'; } ?>"><a href="jobEnquiry.php">Form Submission</a></li>
        </ul>
      </li>
      
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <style>
.treeview-menu > li.active {
	text-decoration: underline;
}
  </style>