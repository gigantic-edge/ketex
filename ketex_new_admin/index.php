<?php include_once('header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Dashboard</h1>
      <ol class="breadcrumb"> 
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
                    <div class="col-md-2 col-sm-6 col-xs-6">
                      <div class="info-box">
                        <span class="info-box-icon" style="color: #fff;">
                            <i class="fa fa-product-hunt" aria-hidden="true" style="text-align: center;font-size: 60px;"></i>
                        </span>
                        <div class="info-box-content">
<?php 
$sql = "SELECT * FROM `product_category` "; 
$query2 = $conn->query($sql);
$totalProductCategory = $query2->rowCount();
?>                                 
                          <span class="info-box-text" style="font-size:17px;">Product Category</span>                           
                          <span class="info-box-number" style="font-size:20px;">
                              <a href="productCategory.php"><?php echo $totalProductCategory;?></a>
                          </span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-6 col-xs-6">
                      <div class="info-box">
                        <span class="info-box-icon" style="color: #fff;">
                            <i class="fa fa-briefcase" aria-hidden="true" style="text-align: center;font-size: 60px;"></i>
                        </span>
                        <div class="info-box-content">
<?php 
$sql = "SELECT * FROM `product_details` "; 
$query2 = $conn->query($sql);
$totalProductCategory = $query2->rowCount();
?>                                 
                          <span class="info-box-text" style="font-size:17px;">Total Product</span>                           
                          <span class="info-box-number" style="font-size:20px;">
                              <a href="productList.php"><?php echo $totalProductCategory;?></a>
                            </span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-6 col-xs-6">
                      <div class="info-box">
                        <span class="info-box-icon" style="color: #fff;">
                            <i class="fa fa-user" aria-hidden="true" style="text-align: center;font-size: 60px;"></i>
                        </span>
                        <div class="info-box-content">
<?php 
$sql = "SELECT * FROM `employee_department` "; 
$query2 = $conn->query($sql);
$totalProductCategory = $query2->rowCount();
?>                                 
                          <span class="info-box-text" style="font-size:17px;">Employee Department</span>                           
                          <span class="info-box-number" style="font-size:20px;"><a href="empDepartment.php"><?php echo $totalProductCategory;?></a></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-6 col-xs-6">
                      <div class="info-box">
                        <span class="info-box-icon" style="color: #fff;">
                            <i class="fa fa-users" aria-hidden="true" style="text-align: center;font-size: 60px;"></i>
                        </span>
                        <div class="info-box-content">
<?php 
$sql = "SELECT * FROM `employee_department` "; 
$query2 = $conn->query($sql);
$totalProductCategory = $query2->rowCount();
?>                                 
                          <span class="info-box-text" style="font-size:17px;">Total Employee</span>                           
                          <span class="info-box-number" style="font-size:20px;"><a href="employeeList.php"><?php echo $totalProductCategory;?></a></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-6 col-xs-6">
                      <div class="info-box">
                        <span class="info-box-icon" style="color: #fff;">
                            <i class="fa fa-file-text" aria-hidden="true" style="text-align: center;font-size: 60px;"></i>
                        </span>
                        <div class="info-box-content">
<?php 
$sql = "SELECT * FROM `pages` "; 
$query2 = $conn->query($sql);
$totalProductCategory = $query2->rowCount();
?>                                 
                          <span class="info-box-text" style="font-size:17px;">CMS Pages</span>                           
                          <span class="info-box-number" style="font-size:20px;"><a href="cmsPages.php"><?php echo $totalProductCategory;?></a></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-6 col-xs-6">
                      <div class="info-box">
                        <span class="info-box-icon" style="color: #fff;">
                            <i class="fa fa-bullhorn" aria-hidden="true" style="text-align: center;font-size: 60px;"></i>
                        </span>
                        <div class="info-box-content">
<?php 
$sql = "SELECT * FROM `notice_board` "; 
$query2 = $conn->query($sql);
$totalProductCategory = $query2->rowCount();
?>                                 
                          <span class="info-box-text" style="font-size:17px;">Notice Board</span>                           
                          <span class="info-box-number" style="font-size:20px;"><a href="noticeBoard.php"><?php echo $totalProductCategory;?></a></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-6 col-xs-6">
                      <div class="info-box">
                        <span class="info-box-icon" style="color: #fff;">
                            <i class="fa fa-trophy" aria-hidden="true" style="text-align: center;font-size: 60px;"></i>
                        </span>
                        <div class="info-box-content">
<?php 
$sql = "SELECT * FROM `awords` "; 
$query2 = $conn->query($sql);
$totalProductCategory = $query2->rowCount();
?>                                 
                          <span class="info-box-text" style="font-size:17px;">Award</span>                           
                          <span class="info-box-number" style="font-size:20px;"><a href="award.php"><?php echo $totalProductCategory;?></a></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-6 col-xs-6">
                      <div class="info-box">
                        <span class="info-box-icon" style="color: #fff;">
                            <i class="fa fa-bold" aria-hidden="true" style="text-align: center;font-size: 60px;"></i>
                        </span>
                        <div class="info-box-content">
<?php 
$sql = "SELECT * FROM `branches` "; 
$query2 = $conn->query($sql);
$totalProductCategory = $query2->rowCount();
?>                                 
                          <span class="info-box-text" style="font-size:17px;">Branch</span>                           
                          <span class="info-box-number" style="font-size:20px;"><a href="branch.php"><?php echo $totalProductCategory;?></a></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-6 col-xs-6">
                      <div class="info-box">
                        <span class="info-box-icon" style="color: #fff;">
                            <i class="fa fa-fighter-jet" aria-hidden="true" style="text-align: center;font-size: 60px;"></i>
                        </span>
                        <div class="info-box-content">
<?php 
$sql = "SELECT * FROM `journey` "; 
$query2 = $conn->query($sql);
$totalProductCategory = $query2->rowCount();
?>                                 
                          <span class="info-box-text" style="font-size:17px;">Journey</span>                           
                          <span class="info-box-number" style="font-size:20px;"><a href="journey.php"><?php echo $totalProductCategory;?></a></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-6 col-xs-6">
                      <div class="info-box">
                        <span class="info-box-icon" style="color: #fff;">
                            <i class="fa fa-quora" aria-hidden="true" style="text-align: center;font-size: 60px;"></i>
                        </span>
                        <div class="info-box-content">
<?php 
$sql = "SELECT * FROM `enquiry` "; 
$query2 = $conn->query($sql);
$totalProductCategory = $query2->rowCount();
?>                                 
                          <span class="info-box-text" style="font-size:17px;">Product Enquiry</span>                           
                          <span class="info-box-number" style="font-size:20px;"><a href="productEnquiry.php"><?php echo $totalProductCategory;?></a></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-6 col-xs-6">
                      <div class="info-box">
                        <span class="info-box-icon" style="color: #fff;">
                            <i class="fa fa-quora" aria-hidden="true" style="text-align: center;font-size: 60px;"></i>
                        </span>
                        <div class="info-box-content">
<?php 
$sql = "SELECT * FROM `enquiry_main` "; 
$query2 = $conn->query($sql);
$totalProductCategory = $query2->rowCount();
?>                                 
                          <span class="info-box-text" style="font-size:17px;">All Enquiry</span>                           
                          <span class="info-box-number" style="font-size:20px;"><a href="allEnquiry.php"><?php echo $totalProductCategory;?></a></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-6 col-xs-6">
                      <div class="info-box">
                        <span class="info-box-icon" style="color: #fff;">
                            <i class="fa fa-envelope-open" aria-hidden="true" style="text-align: center;font-size: 60px;"></i>
                        </span>
                        <div class="info-box-content">
<?php 
$sql = "SELECT * FROM `application_category` "; 
$query2 = $conn->query($sql);
$totalProductCategory = $query2->rowCount();
?>                                 
                          <span class="info-box-text" style="font-size:17px;">Application Category</span>                           
                          <span class="info-box-number" style="font-size:20px;"><a href="applicationCategory.php"><?php echo $totalProductCategory;?></a></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-6 col-xs-6">
                      <div class="info-box">
                        <span class="info-box-icon" style="color: #fff;">
                            <i class="fa fa-envelope-open-o" aria-hidden="true" style="text-align: center;font-size: 60px;"></i>
                        </span>
                        <div class="info-box-content">
<?php 
$sql = "SELECT * FROM `application_details` "; 
$query2 = $conn->query($sql);
$totalProductCategory = $query2->rowCount();
?>                                 
                          <span class="info-box-text" style="font-size:17px;">Total Application</span>                           
                          <span class="info-box-number" style="font-size:20px;"><a href="applicationList.php"><?php echo $totalProductCategory;?></a></span>
                        </div>
                      </div>
                    </div>
                    
                    
      </div>
    </section>
  </div>
<style>
@charset "UTF-8";
@import url("https://fonts.googleapis.com/css?family=PT+Sans:400,700");

#id-card {
  display: inline-block;
  float: left;
  margin-bottom: 2em;
}

.id-card {
  width: 100%;
  /*! height: 192px; */
  background: #f4f4f4;
  padding: 10px;
  position: relative;
  float: left;
}
.id-card__mugshot {
  /*! position: absolute; */
  right: 10px;
  width: 35%;
  /*! height: 100px; */
  /*! border: 2px solid #b4b5b4; */
  background: #ffffff;
  float: left;
  /*! border-radius: 5px; */
}
.id-card__mugshot img {
  max-width: 100%;
}
.id-card__logo {
  width: 65%;
  float: left;
  padding-left: 20px;
}
.id-card__subject-id {
  position: absolute;
  top: 54px;
  left: 130px;
  font-family: monospace;
  font-size: 14pt;
  transform: rotate(-4deg);
}
.id-card__banner {
  /*! height: 10pt; */
  background: #0b394d;
  margin-top: 10px;
  margin-left: 20px;
  padding-left: 12px;
  float: left;
  width: 61%;
  border-radius: 5px;
}
.id-card__banner-text {
  color: #ffffff;
  font-size: 16px;
  padding: 3px 0;
  float: left;
}
.id-card__details {
  padding-top: 10px;
  /*! font-size: 6pt; */
  /*! line-height: 1.5; */
  /*! text-transform: uppercase; */
  width: 65%;
  display: inline-block;
  padding-left: 20px;
}
.id-card__details--short {
  float: right;
  margin-left: 30px;
  width: 100px;
}
.id-card__detail {
  /*! height: 10px; */
  padding-top: 4px;
  padding-bottom: 4px;
}
.id-card__detail + .id-card__detail {
  border-top: 1px solid #eeee;
}
.id-card__detail-label {
  color: #0b394d;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}
.id-card__detail-label:after {
  /*! content: " • "; */
  font-weight: normal;
}

.logo__big {
  font-size: 24pt;
  font-weight: bold;
  line-height: 1.3;
  /*! letter-spacing: 4px; */
  text-transform: uppercase;
}
.logo__small {
  font-size: 10pt;
  letter-spacing: 4px;
  position: relative;
  top: -10px;
  left: 2px;
}
.id-form__row {
  padding-bottom: 8px;
}
.id-form__row--inline {
  width: 10em;
  padding-right: 1em;
  padding-bottom: 1em;
  display: inline-block;
}
.id-form__label {
  font-size: 8pt;
  line-height: 8pt;
}
.material-ui-shadow {
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}
.material-ui-shadow:hover {
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}
.id-card__detail-value {
	float: right;
}
.linkbox {
	float: left;
	width: 100%;
	padding: 10px;
	background-color: #f4f4f4;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
	margin-bottom: 1em;
}
@media only screen and (max-width: 600px) {
.logo__big {
	font-size: 16pt;
}
.id-card__banner {
	width: 57%;
}
.id-card__details {
	width: 100%;
	padding-left: 0px;
}
}
</style>
<?php include_once('footer.php'); ?>