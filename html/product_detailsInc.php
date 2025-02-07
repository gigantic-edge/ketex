<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>Ketex</title>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <?php include 'assets/inc/header.php';?>

      

    

      <!-- ********|| BANNER STARTS ||******** -->

    <section class="about-banner">

          <!-- <img class="img-fluid" src="assets/img/banner-10.jpg" alt=""> -->
          <img class="img-fluid" src="assets/img/Product.jpg" alt="">

      </section>

    <!-- ********|| BANNER ENDS ||******** -->

      

    <!-- ********|| OUR PRODUCTS FABRIC STARTS ||******** -->

        <section class="our-product">

          <div class="container">

              <div class="row">

                 <div class="col-lg-12">

                     <div class="product-part">

                             

                                        <div class="row">

  <div class="col-lg-3 col-12 sidebar_left mb-4">

    <div class="nav flex-column nav-pills pt-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">

  <?php 

$sql ="SELECT * FROM `product_details` WHERE `pro_id` = '". $_GET['id']."'";

$query2 = $conn->query($sql);

$productData = $query2->fetch(PDO::FETCH_LAZY); 

  foreach ($allsearch1arr as $k => $v): ?>



    <a class="nav-link <?php if($v['cat_id'] == $productData['cat_id']){?> active<?php } ?>" id="v-pills-home-tab" href="<?php echo $base_url ?>product_listing.php?ID=<?php echo $v['cat_id'] ?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><?php echo $v['cat_name'] ?></a>

   

    <?php

     endforeach;

    ?> 

    </div>

  </div>

  <div class="col-lg-9 col-12">

	<div class="why-tab">

		<div class="tab-content" id="v-pills-tabContent">

			<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

				<div class="row">

					<div class="col-lg-10 col-md-10 col-12">

						 <div class="tab-content" id="v-pills-tabContent">

									<?php

$sql ="SELECT * FROM `product_image` WHERE `pro_id` = '".$_GET['id']."' ORDER BY `image_position` DESC  ";

$query = $conn->query($sql);

$productimagearr = $query->fetchAll(PDO::FETCH_ASSOC);									

										foreach ($productimagearr as $k => $v):

									?>

							<div class="tab-pane fade <?php if ($v['image_position'] == '1') { ?> show active <?php } ?>" id="v-pills-pro<?php echo $v['proimg_id']; ?>" 

							role="tabpanel" aria-labelledby="v-pills-pro<?php echo $v['proimg_id']; ?>-tab">

								<div class="fabric-inner">

									<div class="fabric-img">

									  <img class="img-fluid" id="myImage" src="<?php echo $database->base_url . $database->document_path_site_image . $v['product_img']; ?>">

									</div>

								</div>

							</div>		

									<?php

									  endforeach;

									?>					

						 </div>

					</div>

					<div class="col-lg-2 col-md-2 col-12">

	<div class="new-tab-my">

	  <div class="nav flex-column nav-pills p-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">

	<?php

	  foreach ($productimagearr as $k => $v):

	?>

		<a class="nav-link <?php if ($v['image_position'] == '1') { ?> active <?php } ?>" id="v-pills-pro<?php echo $v['proimg_id']; ?>-tab" data-toggle="pill" 

		href="#v-pills-pro<?php echo $v['proimg_id']; ?>" role="tab" aria-controls="v-pills-pro<?php echo $v['proimg_id']; ?>" aria-selected="true">

		    <img class="img-fluid" src="<?php echo $database->base_url . $database->document_path_site_image . $v['product_img']; ?>"></a>

		

		<!-- <a class="nav-link" id="v-pills-pro2-tab" data-toggle="pill" href="#v-pills-pro2" role="tab" aria-controls="v-pills-pro2" aria-selected="false"><img class="img-fluid" src="assets/img/product-details-1.2.jpg"></a>

		  

		<a class="nav-link" id="v-pills-pro-3-tab" data-toggle="pill" href="#v-pills-pro-3" role="tab" aria-controls="v-pills-pro-3" aria-selected="false"><img class="img-fluid" src="assets/img/product-details-1.3.jpg"></a> -->

	<?php endforeach; ?>

	 </div> 

	</div>

  </div>

				</div>

			</div>

		</div>



  

  

  

  <div class="lead-acid">

	<?php

		foreach ($productlistarr as $k4 => $v4):

	  ?>

	  <div class="lead-title">

		<!-- Gauntlets for Lead Acid Storage Battery -->

		<?php echo $v4['pro_name'] ?>

	  </div>

	  <div class="fabric-action">

                        <div class="email-action">

                            <div class="form-part">



                <button type="button" class="email-btn" data-toggle="modal" data-target="#exampleModal">



                    <i class="zmdi zmdi-email"></i>send email to us



                </button>



            </div>    



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

            <h5 class="modal-title" id="exampleModalLabel">Product Enquiry</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">



          <span aria-hidden="true">&times;</span>



        </button>

      </div>

            <p style="background-color: green;color: #fff;padding: 10px;padding-left: 21px;display:none;" id="successMessageProductShow">Your Product Enquiry Send Successfully ,Thank You!</p>



      <div class="modal-body enquiry_from">

       <div class="modal-form">



           <form id="productDetailEnquiryForm">

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Name" name="cst_name" id="formName" required>

                    <input type="hidden" name="pro_id" value="<?php echo $_GET['id'] ?>">

  </div>



  <div class="form-group">

      <input type="email" class="form-control" placeholder="Email" name="email" id="formEmail" required>

  </div>

 <div class="form-group">

     <input type="number" class="form-control" placeholder="Phone" name="phn_number" id="formPhone" required pattern="[6-9]{1}[0-9]{9}">

  </div>

   <div class="form-group">

       <textarea class="form-control" placeholder="Message" rows="3" name="message" id="formMessage" required></textarea>

  </div>



                     <div class="form-group">

                            <div class="col-md-6 pl-0 mb-2">

                                <input  class="form-control" placeholder="Enter Captcha" name="CaptchaInput" id="CaptchaInputProDetail" class="textEntry" type="text" autocomplete="off">

                            </div>     

                            <div class="col-md-3 pl-0">

                                <div id="CaptchaDivProDetail" style="border: 1px solid #006280;padding: 10px;clear: both;color: #fff;float: left;margin-right: 15px;background-color: #006280;"></div>

                                <div>

                                    <input type="hidden" id="txtCaptchaProDetail">

                                </div>  

                                <div class="col-md-1">          

                                    <div style="padding:10px;" onclick="refreshCaptchaProDetail()">

                                        <img name="" id="" src="https://www.freeiconspng.com/thumbs/refresh-icon/refresh-icon-0.png" style="height:30px;width:30px;" tabindex="0"/>

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

            

<!--                          <a href="#exampleModal" class="email-btn"><i class="zmdi zmdi-email"></i>send email to us</a>-->

                        </div>

                        <div class="pdf-action">

                          <!-- <a href="#" class="pdf-btn"><img class="img-fluid" src="assets/img/pdf-img.png">download  pdf</a> -->

                          <?php if ($v4['pdf'] == '') { ?>

                          <?php } else { ?>

                            <a class="pdf-btn" href="<?php echo $database->base_url . $database->document_path_site_image .$v4['pdf'] ?>" target="_blank" class="aprl" id="aprl-3" <?php echo  $v4['pdf'] ?>><img class="img-fluid" src="assets/img/noticeboard_pdf.svg">Download TDS</a>

                          <?php } ?>

                        </div>

    </div>

  </div>

  

  <div class="fiber-inner">

		<!--<div class="fiber-title">

			Fiber Glass Filtration Fabric

		</div>-->

		<div class="fiber-content">

		<?php echo $v4['pro_description']; ?>

		</div>

		<!--<div class="fiber-title">

			Main Application

		</div>

		<div class="fiber-content">

			Widely used for Filtration of molten Aluminium in foundry of automobile wheel, motorcycle wheel, cylinder piston as well as aluminium alloy parts. AS-KETEX Thermally Formed Combo Bags does....(a) stays firm continuously for a longer time @ 1200 °C (b) have very low smoke and flame when in contact with Molten Aluminium. (c) results a are very cost effective and yields higher ROI. (d) resourcefully decrease the scuffle after the casting and smelting. (e) comprises of the high thermal resistant. (f) have effective properties to eliminate the inclusions, which results perfection of mechanical strength and surface finish.

		</div>

		<div class="fiber-title">

			Main Specification

		</div>

		<div class="fiber-content">

			Advantages of Thermally Formed Combo Bags. (1) Negligible Odor & Smoke during 1st contact to Molten Aluminium. (2) Diminish Scrap. (3) Eradicates Oxides. (4) Unvarying Metal Dispersal. (5) Reduces Turbulence.

		</div>-->

   </div>

   <div class="table-inner">

		<table class="table table-bordered">



			<?php //echo $v4['description'] ?>

		  </table>

		  

		  <!-- <?php echo $v4['description'] ?> -->

		</div>

	</div>



  </div>  

  

	<?php

	  endforeach;

	?> 

                     </div>

                 

                  </div>

              </div>

              </div>

          </div>

      </section>

    

      

     <!-- ********|| OUR PRODUCTS FABRIC ENDS ||******** -->

    

    

<script type="text/javascript">



var a = Math.ceil(Math.random() * 9)+ '';

var b = Math.ceil(Math.random() * 9)+ '';

var c = Math.ceil(Math.random() * 9)+ '';

var d = Math.ceil(Math.random() * 9)+ '';

var e = Math.ceil(Math.random() * 9)+ '';



var code = a + b + c + d + e;

document.getElementById("txtCaptchaProDetail").value = code;

document.getElementById("CaptchaDivProDetail").innerHTML = code;



function refreshCaptchaProDetail(){



var a = Math.ceil(Math.random() * 9)+ '';

var b = Math.ceil(Math.random() * 9)+ '';

var c = Math.ceil(Math.random() * 9)+ '';

var d = Math.ceil(Math.random() * 9)+ '';

var e = Math.ceil(Math.random() * 9)+ '';



document.getElementById("CaptchaInputProDetail").value = '';



var code = a + b + c + d + e;

document.getElementById("txtCaptchaProDetail").value = code;

document.getElementById("CaptchaDivProDetail").innerHTML = code;

    

}

</script>    

      

<?php include 'assets/inc/footer.php';?>

      

<script type="text/javascript">

$(document).ready(function(){

    $('#productDetailEnquiryForm').submit(function(e){

        e.preventDefault();

        var captchaCode = $('#productDetailEnquiryForm').find('input[id="txtCaptchaProDetail"]').val();

        var CaptchaInput = $('#productDetailEnquiryForm').find('input[id="CaptchaInputProDetail"]').val();

        if(CaptchaInput == ''){

            alert('Please Enter Captcha Code'); return false;

        } 

        if(CaptchaInput != captchaCode){

            alert('Please Enter Valid Captcha Code'); return false;

        } 

        $.ajax({

            url: "db_enquiry_product.php",

            type: "POST",

            data: $(this).serialize(),

            success: function(data){

                $('#formName').val('');

                $("#formEmail").val('');

                $("#formPhone").val('');

                $("#formMessage").val('');

                $("CaptchaInputProDetail").val('');

                $("#successMessageProductShow").css('display','block');

                setTimeout(function(){

                  $("#successMessageProductShow").css('display','none');

                }, 8000);

            }

        });

    });

});

</script>



  </body>

</html>