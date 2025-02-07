<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>Ketex</title>

      

      <?php include 'assets/inc/header.php';?>

      <?php include 'notice_d.php';?>

      

    

      <!-- ********|| BANNER STARTS ||******** -->

  <section class="contact-banner">

      <img class="img-fluid" src="assets/img/banner-2.jpg" alt="">

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

      

    <!-- ********|| NOTICE STARTS ||******** -->

      <section class="notice-part">

          <div class="container">

              <div class="row">

                  <div class="col-lg-12">

                      <div class="title-inner">

                          <div class="title">notice board</div>

                      </div>

                  </div>

              </div>

              <div class="row">

              <?php

                                    if (!empty($noticedetails)):

                                        $i = 1;

                                        foreach ($noticedetails as $k => $v):

                                            ?>

                 <div class="col-xl-6 col-lg-12 col-md-12">

                     <div class="notice-inner">

                        
                        <div class="notice-img">

                            <!--<img src="<?php echo $database->base_url . $database->document_path_site_image . $v['image']; ?>"/>-->
                            
                                                <?php 
                                                if($v['image']==''){
                                                    ?>
                                                        <img src="upload/icon/notice_icon.jpg" alt="" " >
                                                                                                                
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <img src="<?php echo $database->base_url . $database->document_path_site_image . $v['image']; ?>"/>
                                                    <?php
                                                }
                                                ?>
                                            

                         </div>

                               

                         <div class="notice-info">

                            <div class="notice-title">

                            <?php echo $v['title']?>

                            </div>

                              <div class="notice-date">
                                                        <?php
                                                            
                                                            $start_date= strtotime($v['date']);
                                                            echo date('D, d-F-Y', $start_date);
                                                        ?><br>

                              

                            </div>

                             <div class="notice-content">

                             <div class="noticecont_info"><?php echo $v['content'];?></div>
                             
                             <?php if($v['pdf'] != ''){ ?>
                             
                				<a href="upload/profile_image/<?php echo $v['pdf'];?>" target="_blank" class="noticpdf-btn" target="_blank"><img class="img-fluid" src="assets/img/noticeboard_pdf.svg" alt=""> View Notice</a>
                			<?php } ?>	

                            </div>

                         </div>

                    </div>

                 </div>

                  <!-- <div class="col-xl-6 col-lg-12 col-md-12">

                     <div class="notice-inner">

                        <div class="notice-img">

                            <img class="img-fluid" src="assets/img/notice-2.jpg">

                         </div>

                         <div class="notice-info">

                            <div class="notice-title">

                                Curtains for Annealing Furnace...

                            </div>

                              <div class="notice-date">

                                From  01-04-2016  To  01-04-2016

                            </div>

                             <div class="notice-content">

                                Recent development of High Silica Curtains for annealing furnaces. Temperature upto 1200 °C High Temperature materials are made of Silica Coated Fiberglass. AS-KETEX can create a industrial curtain wall of close weave fabric or hanging yarn enclosure to contain your high temperature environments.

                            </div>

                         </div>

                    </div>

                 </div>

                  <div class="col-lg-6">

                     <div class="notice-inner">

                        <div class="notice-img">

                            <img class="img-fluid" src="assets/img/notice-3.jpg">

                         </div>

                         <div class="notice-info">

                            <div class="notice-title">

                                Curtains for Annealing Furnace...

                            </div>

                              <div class="notice-date">

                                From  01-04-2016  To  01-04-2016

                            </div>

                             <div class="notice-content">

                                Recent development of High Silica Curtains for annealing furnaces. Temperature upto 1200 °C High Temperature materials are made of Silica Coated Fiberglass. AS-KETEX can create a industrial curtain wall of close weave fabric or hanging yarn enclosure to contain your high temperature environments.

                            </div>

                         </div>

                    </div>

                 </div>

                  <div class="col-lg-6">

                     <div class="notice-inner">

                        <div class="notice-img">

                            <img class="img-fluid" src="assets/img/notice-2.jpg">

                         </div>

                         <div class="notice-info">

                            <div class="notice-title">

                                Curtains for Annealing Furnace...

                            </div>

                              <div class="notice-date">

                                From  01-04-2016  To  01-04-2016

                            </div>

                             <div class="notice-content">

                                Recent development of High Silica Curtains for annealing furnaces. Temperature upto 1200 °C High Temperature materials are made of Silica Coated Fiberglass. AS-KETEX can create a industrial curtain wall of close weave fabric or hanging yarn enclosure to contain your high temperature environments.

                            </div>

                         </div>

                    </div>

                 </div>

                  <div class="col-lg-6">

                     <div class="notice-inner">

                        <div class="notice-img">

                            <img class="img-fluid" src="assets/img/notice-3.jpg">

                         </div>

                         <div class="notice-info">

                            <div class="notice-title">

                                Curtains for Annealing Furnace...

                            </div>

                              <div class="notice-date">

                                From  01-04-2016  To  01-04-2016

                            </div>

                             <div class="notice-content">

                                Recent development of High Silica Curtains for annealing furnaces. Temperature upto 1200 °C High Temperature materials are made of Silica Coated Fiberglass. AS-KETEX can create a industrial curtain wall of close weave fabric or hanging yarn enclosure to contain your high temperature environments.

                            </div>

                         </div>

                    </div>

                 </div>

                  <div class="col-lg-6">

                     <div class="notice-inner">

                        <div class="notice-img">

                            <img class="img-fluid" src="assets/img/notice-2.jpg">

                         </div>

                         <div class="notice-info">

                            <div class="notice-title">

                                Curtains for Annealing Furnace...

                            </div>

                              <div class="notice-date">

                                From  01-04-2016  To  01-04-2016

                            </div>

                             <div class="notice-content">

                                Recent development of High Silica Curtains for annealing furnaces. Temperature upto 1200 °C High Temperature materials are made of Silica Coated Fiberglass. AS-KETEX can create a industrial curtain wall of close weave fabric or hanging yarn enclosure to contain your high temperature environments.

                            </div>

                         </div>

                    </div>

                 </div> -->

                 <?php

 $i++;

endforeach;

endif;

?>

              </div>

          </div>

      </section>

    <!-- ********|| NOTICE ENDS ||******** -->

      

      

      

      

    

    

    

      

<?php include 'assets/inc/footer.php';?>

      

  </body>

</html>