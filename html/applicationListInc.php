
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ketex</title>
      
      <?php include 'assets/inc/header.php';?> 
      <!-- ********|| BANNER STARTS ||******** -->
      <section class="about-banner">
          <img class="img-fluid" src="assets/img/banner-4.jpg" alt="">
      </section>
    <!-- ********|| BANNER ENDS ||******** -->
      
    <!-- ********|| OUR PRODUCTS STARTS ||******** -->
      <section class="our-product">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="title-inner">
                          <div class="title-appli">Application</div>
                      </div>
                  </div>
              </div>
              <div class="row">
                 <div class="col-lg-12">
                     <div class="product-part">
    <div class="row">
  <div class="col-lg-3 col-12 mb-5 pt-5 sidebar_left">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <?php 
  if(isset($_GET['ID'])){
    $categoryID = $_GET['ID'];
  }else {
     $categoryID = '1';
  }
$sql ="SELECT * FROM `application_category` ";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);    
  foreach ($rows as $row){ ?>
      <a class="nav-link <?php if($row['cat_id'] == $categoryID){?> active <?php } ?>" id="v-pills-home-tab_<?php echo $row['cat_id']; ?>" data-toggle="pill" href="#productTab_<?php echo $row['cat_id']; ?>" role="tab" 
      aria-controls="contorlTab_<?php echo $row['cat_id']; ?>" <?php if($v['cat_id'] == $categoryID){?> aria-selected="true" <?php } else { ?> aria-selected="false" <?php } ?>><?php echo $row['cat_name'] ?></a>
    <?php
  }
    ?>
    </div>
  </div>
  <div class="col-lg-9 col-12">
      <div class="why-tab">
    <div class="tab-content" id="v-pills-tabContent">
    <?php 
$sql ="SELECT * FROM `application_category` ";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);    
  foreach ($rows as $k => $v){ ?>
  
      <div class="tab-pane fade <?php if($v['cat_id'] == $categoryID){?> show active <?php } ?>" id="productTab_<?php echo $v['cat_id']; ?>" 
      role="tabpanel" aria-labelledby="contorlTab_<?php echo $v['cat_id']; ?>">
                <div class="row">
                                     
                <?php 
$sql ="SELECT * FROM `application_details` WHERE `cat_id` = '".$v['cat_id']."'  ";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);
                
                   foreach ($rows as $k4 => $v4) {
                ?>
                                    <div class="col-lg-4 pt-5">
                                         <div class="product-details">
                                             <div class="product-box">
                                                 <div class="gallery-part">
                                                     <div class="gallery">
                                                          <img src="<?php echo $database->base_url . $database->document_path_site_image . $v4['app_image']; ?>" width= "260px;" height="200px;">
                                                          
                                                          <div class="hvr">
                                                              <i class="zmdi zmdi-zoom-in"></i>
                                                          </div>
                                                      </div>
                                                </div>
                                                 <div class="product-body">
                                                     <div class="product-title">
                                                     <?php echo $v4['app_name'] ?>
                                                 </div>
                                                 <div class="product-content">
                                                     <?php echo strlen(strip_tags($v4['app_description'])) > 200 ? substr(strip_tags($v4['app_description']),0,200)."..." : strip_tags($v4['app_description']); ?>
                                                     <?php //echo strip_tags($v4['app_description']) ?>
                                                 </div>
                                                     <div class="product-action">
                                                            <!--<a href="<?php echo $base_url; ?>product_details.php?id=<?php echo $v4['pro_id'] ?>" class="read-btn">+Read more</a>
                                                            <a href="#" class="get-btn">Get a Quote</a>-->
                                                     </div>
                                                </div>
                                             </div>
                                             
                                         </div>
                                    </div>


                                    <?php } ?>
                        
      </div>
<!--            <hr>-->
       
        </div>
    
    <?php
        }
    ?>    
          
      </div>
  
        </div>

    </div>
                         
                     </div>
                 
                  </div>
              </div>
          </div>
      </section>
    <!-- ********|| OUR PRODUCTS ENDS ||******** -->
      
<?php include 'assets/inc/footer.php';?>
      
  </body>
</html>