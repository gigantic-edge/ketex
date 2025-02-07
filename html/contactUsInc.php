<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ketex</title>
      
      <?php include 'assets/inc/header.php';?>
      
    
      <!-- ********|| BANNER STARTS ||******** -->
  <section class="contact-banner">
      <img class="img-fluid" src="assets/img/banner-6.jpg" alt="">
<!--
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="banner-img">
                         <img class="img-fluid" src="assets/img/title-img.png">
                     </div>
                 </div>
             </div>
          </div> 
-->
      </section>
    <!-- ********|| BANNER ENDS ||******** -->
      
    <!-- ********|| CONTACT STARTS ||******** -->
      <section class="contact-sec">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="title-inner">
                          <div class="title">contact us</div>
                      </div>
                  </div>
              </div>
              <div class="row">
                <?php
                   foreach ($branchesListArr as $k4 => $v4) {
                ?>
                 <div class="col-lg-4">
                     <div class="contact-inner">
                         <div class="contact-img">
                             <?php //echo $v4['map']; ?>
                                <?php if($v4['map'] != ''){ ?>
                             <iframe src="<?php echo $v4['map']; ?>" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            <?php } ?> 
                         </div>
                         <div class="contact-title">
                            <?php echo $v4['title']; ?>
                         </div>
                         <div class="contact-info">
                             <!--<div class="location-title">
                                 <?php echo $v4['title']; ?>
                             </div>-->
                             <div class="contact-content">
                                 <?php echo $v4['address']; ?>
                             </div>
                             <div class="location-inner">
                                <?php if($v4['phone'] != ''){ ?> 
                                 <div class="location-contact">
                                     <div class="location-box">
                                         Phone 
                                     </div>
                                      <div class="location-no">
                                         :
                                         <a href="tel:<?php echo $v4['phone']; ?>" class="ph-no"><?php echo $v4['phone']; ?></a>
                                     </div>
                                 </div>
                                 <?php } ?>
                                <?php if($v4['fax'] != ''){ ?> 
                                  <div class="location-contact">
                                     <div class="location-box">
                                         Fax 
                                     </div>
                                      <div class="location-no">
                                         :
                                         <a href="#" class="ph-no"><?php echo $v4['fax']; ?></a>
                                     </div>
                                 </div>
                                 <?php } ?>
                                <?php if($v4['email'] != ''){ ?> 
                                  <div class="location-contact">
                                     <div class="location-box">
                                         Email 
                                     </div>
                                     <div class="location-no">:
                                         <a href="mailto:<?php echo $v4['email']; ?>" class="email-sec"><?php echo $v4['email']; ?></a>
                                     </div>
                                 </div>
                                 <?php } ?>
                             </div>
                         </div>     
                     </div> 
                 </div>
                 <?php } ?>
              </div>
          </div>
      </section>
    <!-- ********|| CONTACT ENDS ||******** -->
      
      
      
      
    
    
    
      
<?php include 'assets/inc/footer.php';?>
      
  </body>
</html>