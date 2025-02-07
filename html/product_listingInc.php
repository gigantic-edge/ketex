

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

          <img class="img-fluid" src="assets/img/Product.jpg" alt="">

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

      

    <!-- ********|| OUR PRODUCTS STARTS ||******** -->

      <section class="our-product">

          <div class="container">

              <div class="row">

                  <div class="col-lg-12">

                      <div class="title-inner">

                          <div class="title">our products</div>

                          <div class="title-content">

                              <!--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tristique nisi non diam posuere, quis lacinia orci aliquam. Duis consectetur lorem tortor, eget mollis magna porta vitae. Cras semper pretium orci in cursus. Nulla justo leo, malesuada eu lacus sed, scelerisque egestas leo. Fusce congue at metus non congue. Nunc fermentum sollicitudin neque, vel ornare ligula tincidunt non. Nam tristique, nunc id sollicitudin sollicitudin, justo ex interdum eros, in lacinia elit ex at ex. Donec accumsan magna a est sollicitudin, sit amet porta libero volutpat. In vitae dolor accumsan, finibus massa at, lacinia lectus. Ut et laoreet mauris, ut lobortis nibh. Sed at orci vitae purus tristique laoreet. Nulla bibendum magna nec magna facilisis consequat.-->

                          </div>

                      </div>

                  </div>

              </div>

              <div class="row">

                 <div class="col-lg-12">

                     <div class="product-part">

                                   

                             

    <div class="row">

  <div class="col-lg-3 col-12 pt-5 mb-5 sidebar_left">

    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

  <?php 

    $categoryID = $_GET['ID'];

  foreach ($allsearch1arr as $k => $v): ?>



      <!--<a class="nav-link <?php if($v['cat_id'] == $categoryID){?> active <?php } ?>" id="v-pills-home-tab" href="<?php echo $base_url ?>product_listing.php?ID=<?php echo $v['cat_id'] ?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><?php echo $v['cat_name'] ?></a>--->

      <a class="nav-link <?php if($v['cat_id'] == $categoryID){?> active <?php } ?>" id="v-pills-home-tab_<?php echo $v['cat_id']; ?>" data-toggle="pill" href="#productTab_<?php echo $v['cat_id']; ?>" role="tab" 

      aria-controls="contorlTab_<?php echo $v['cat_id']; ?>" <?php if($v['cat_id'] == $categoryID){?> aria-selected="true" <?php } else { ?> aria-selected="false" <?php } ?>><?php echo $v['cat_name'] ?></a>

      

      

    <?php

     endforeach;

    ?>

    </div>

  </div>

  <div class="col-lg-9 col-12">

      <div class="why-tab">

    <div class="tab-content" id="v-pills-tabContent">

    <?php 

    $categoryID = $_GET['ID'];

  foreach ($allsearch1arr as $k => $v): ?>

  

      <div class="tab-pane fade <?php if($v['cat_id'] == $categoryID){?> show active <?php } ?>" id="productTab_<?php echo $v['cat_id']; ?>" 

      role="tabpanel" aria-labelledby="contorlTab_<?php echo $v['cat_id']; ?>">

                <div class="row">

                                     

                <?php 



$sql ="SELECT count(pro_id) AS id FROM `product_details` WHERE `cat_id` = '".$v['cat_id']."'  ";

$query = $conn->query($sql);

$allProductsByCat = $query->fetchAll(PDO::FETCH_ASSOC);

$allProductsCount = $allProductsByCat[0]['id'];





$limit = '10';                

// Calculate total pages

$totoalPages = ceil($allProductsCount / $limit);

if($v['cat_id'] == $categoryID){

$page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;

} else {

$page = 1;

}

$paginationStart = ($page - 1) * $limit;

$prev = $page - 1;

$next = $page + 1;

                

$sql ="SELECT * FROM `product_details` WHERE `cat_id` = '".$v['cat_id']."' LIMIT $paginationStart, $limit  ";

$query = $conn->query($sql);

$productlist = $query->fetchAll(PDO::FETCH_ASSOC);



$sql ="SELECT * FROM `product_details` WHERE `cat_id` = '".$v['cat_id']."' LIMIT $paginationStart, $limit ";

$query = $conn->query($sql);

$rows = $query->fetchAll(PDO::FETCH_ASSOC);

                

                   foreach ($rows as $k4 => $v4) {

                       

$sql ="SELECT * FROM `product_image` WHERE `pro_id` = '". $v4['pro_id']."' && `image_position` = '1' ";

$query2 = $conn->query($sql);

$proImageData = $query2->fetch(PDO::FETCH_LAZY);                       

                ?>

                                    <div class="col-lg-4 pt-5">

                                         <div class="product-details">

                                             <div class="product-box">

                                                 <div class="gallery-part">

                                                     <div class="gallery">

                                                          <!-- <img class="img-fluid" src="assets/img/poduct-1.jpg"> -->



                                                          <img src="<?php echo $database->base_url . $database->document_path_site_image . $proImageData['product_img']; ?>" width= "260px;" height="200px;">

                                                          

                                                          <div class="hvr">

                                                              <!-- <i class="zmdi zmdi-zoom-in"></i> -->

                                                          </div>

                                                      </div>

                                                </div>

                                                 <div class="product-body">

                                                     <div class="product-title">

                                                     <!-- Gauntlets for Lead Acid Storage Battery -->

                                                     <?php echo $v4['pro_name'] ?>

                                                 </div>

                                                 <div class="product-content">

                                                     <!-- Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet  -->

                                                     <!--<?php echo strip_tags($v4['pro_description']) ?>-->

                                                     <?php  $string =strip_tags($v4['pro_description']);

                                                        $string = (strlen($string) > 40)?substr($string,0,90).'.....': $string;

                                                        echo $string;

                                                        ?>

                                                 </div>

                                                     <div class="product-action">

                                                            <a href="<?php echo $base_url; ?>product_details.php?id=<?php echo $v4['pro_id'] ?>" class="read-btn">+Read more</a>

                                                            <a href="#" class="get-btn" data-toggle="modal" data-target="#exampleModal<?php echo $v4['pro_id']; ?>" data-id="<?php echo $v4['pro_id'] ?>">Get a Quote</a>

                                                     </div>

                                                </div>

                                             </div>

                                             

                                         </div>

                                    </div>

                                    



<div class="modal fade" id="exampleModal<?php echo $v4['pro_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

            <h5 class="modal-title" id="exampleModalLabel">Product Enquiry</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">



          <span aria-hidden="true">&times;</span>



        </button>

      </div>

            <p style="background-color: green;color: #fff;padding: 10px;padding-left: 21px;display:none;" id="successMessageProductShow">

                Your Product Enquiry Send Successfully ,Thank You!</p>



      <div class="modal-body enquiry_from">

       <div class="modal-form">



           <form id="productEnquiryForm<?php echo $v4['pro_id']; ?>">

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Name" name="cst_name" id="formName" required>

                    <input type="hidden" name="pro_id" value="<?php echo $v4['pro_id']; ?>">

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

                                <input  class="form-control" placeholder="Enter Captcha" name="CaptchaInput" id="CaptchaInputPro<?php echo $v4['pro_id']; ?>" class="textEntry" type="text" autocomplete="off">

                            </div>     

                            <div class="col-md-3 pl-0">

                                <div id="CaptchaDivPro<?php echo $v4['pro_id']; ?>" style="border: none;height: 40px;width: 102px;display: flex;justify-content: center;align-items: center;clear: both;color: #fff;float: left;margin-right: 15px;background-color: #006280;"></div>

                                <div>

                                    <input type="hidden" id="txtCaptchaPro<?php echo $v4['pro_id']; ?>">

                                </div>  

                                <div class="col-md-1">          

                                    <div class="career-capcha" style="padding:10px;" onclick="refreshCaptchaPro<?php echo $v4['pro_id']; ?>()">

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



<script type="text/javascript">



var a = Math.ceil(Math.random() * 9)+ '';

var b = Math.ceil(Math.random() * 9)+ '';

var c = Math.ceil(Math.random() * 9)+ '';

var d = Math.ceil(Math.random() * 9)+ '';

var e = Math.ceil(Math.random() * 9)+ '';



var code = a + b + c + d + e;

document.getElementById("txtCaptchaPro<?php echo $v4['pro_id']; ?>").value = code;

document.getElementById("CaptchaDivPro<?php echo $v4['pro_id']; ?>").innerHTML = code;



function refreshCaptchaPro<?php echo $v4['pro_id']; ?>(){



var a = Math.ceil(Math.random() * 9)+ '';

var b = Math.ceil(Math.random() * 9)+ '';

var c = Math.ceil(Math.random() * 9)+ '';

var d = Math.ceil(Math.random() * 9)+ '';

var e = Math.ceil(Math.random() * 9)+ '';



document.getElementById("CaptchaInputPro<?php echo $v4['pro_id']; ?>").value = '';



var code = a + b + c + d + e;

document.getElementById("txtCaptchaPro<?php echo $v4['pro_id']; ?>").value = code;

document.getElementById("CaptchaDivPro<?php echo $v4['pro_id']; ?>").innerHTML = code;

    

}

</script>    

                                    

                                    <?php } ?>

      </div>

<!--            <hr>-->

       

        

              <div class="row">

                  <div class="product-nav">

                          <nav aria-label="Page navigation example">

                              <ul class="pagination">

                                <li class="page-item" <?php if($page <= 1){ echo 'disabled'; } ?>>

                                    <a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?ID=".$v['cat_id']."&page=" . $prev; } ?>" aria-label="Previous"><span aria-hidden="true">&laquo; prev</span></a></li>

                                <?php for($i = 1; $i <= $totoalPages; $i++ ): ?>

                                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">

                                    <a class="page-link" href="<?php echo "?ID=".$v['cat_id']."&page=" . $i; ?>"><?php echo $i;?></a></li>

                                <?php endfor; ?>

                                <li class="page-item <?php if($page >= $totoalPages) { echo 'disabled'; } ?>">

                                  <a class="page-link" href="<?php if($page >= $totoalPages){ echo '#'; } else {echo "?ID=".$v['cat_id']."&page=" . $next; }?>" aria-label="Next">

                                    <span aria-hidden="true">next &raquo;</span>

                                  </a>

                                </li>

                              </ul>

                            </nav>

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

              </div>

              

              

          </div>

      </section>

    <!-- ********|| OUR PRODUCTS ENDS ||******** -->

<?php include 'assets/inc/footer.php';?>

      

<?php 

$categoryID = $_GET['ID'];

  foreach ($allsearch1arr as $k => $v):

      

$sql ="SELECT * FROM `product_details` WHERE `cat_id` = '".$v['cat_id']."'  ";

$query = $conn->query($sql);

$productlist = $query->fetchAll(PDO::FETCH_ASSOC);



foreach ($productlist as $k => $v): ?>

<script type="text/javascript">

$(document).ready(function(){

    $('#productEnquiryForm<?php echo $v['pro_id']; ?>').submit(function(e){

        e.preventDefault();

        var captchaCode = $('#productEnquiryForm<?php echo $v['pro_id']; ?>').find('input[id="txtCaptchaPro<?php echo $v['pro_id']; ?>"]').val();

        var CaptchaInput = $('#productEnquiryForm<?php echo $v['pro_id']; ?>').find('input[id="CaptchaInputPro<?php echo $v['pro_id']; ?>"]').val();

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

                $('#productEnquiryForm<?php echo $v['pro_id']; ?>').find($('input[id="formName"]').val(''));

                $('#productEnquiryForm<?php echo $v['pro_id']; ?>').find($('input[id="formEmail"]').val(''));

                $('#productEnquiryForm<?php echo $v['pro_id']; ?>').find($('input[id="formPhone"]').val(''));

                $('#productEnquiryForm<?php echo $v['pro_id']; ?>').find($('input[id="formMessage"]').val(''));

                $('#productEnquiryForm<?php echo $v['pro_id']; ?>').find($('input[id="CaptchaInputPro<?php echo $v['pro_id']; ?>"]').val(''));

                $('#productEnquiryForm<?php echo $v['pro_id']; ?>').find($('p[id="successMessageProductShow"]').css('display','block'));

                setTimeout(function(){

                  $('#productEnquiryForm<?php echo $v['pro_id']; ?>').find($('p[id="successMessageProductShow"]').css('display','none'));

                  $("#exampleModal<?php echo $v['pro_id']; ?>").modal("hide");

                }, 3000);

            }

        });

    });

});

</script>

<?php  endforeach; ?>

<?php  endforeach; ?>

<style>

    .page-item.active .page-link {

	color: #fff;

}

.page-item.active {

	background-color: #f60;

}

</style>

  </body>

</html>