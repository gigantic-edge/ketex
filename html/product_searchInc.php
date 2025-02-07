<!doctype html>

<html lang="en">
<head>

<!-- Required meta tags -->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ketex</title>
<?php include 'assets/inc/header.php';?>

<!-- ********|| BANNER STARTS ||******** -->

<section class="about-banner"> <img class="img-fluid" src="assets/img/product-listing-ban.jpg"> 
  
</section>

<!-- ********|| BANNER ENDS ||******** --> 

<!-- ********|| OUR PRODUCTS STARTS ||******** -->

<section class="our-product">
  <div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="title-inner">
        <div class="title text-left">Search Results for: <?php echo $_POST['keyword'];?></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="product-part">
        <div class="row">
          <div class="col-lg-12 col-12">
            <div class="why-tab"> 
            	<div class="row">
            	    
            	    
            <?php 
            
            $sql ="SELECT count(`pro_id`) as totalProduct FROM `product_details` where `pro_name` like '%".$_POST['keyword']."%' || `pro_description` like  '%".$_POST['keyword']."%' ";
            $query2 = $conn->query($sql);
            $proTotalData = $query2->fetch(PDO::FETCH_LAZY); 
            
            if($proTotalData['totalProduct'] > 0){ 
                
if(isset($_POST['keyword'])){ 
    
            $sql ="SELECT * FROM `product_details` where `pro_name` like '%".$_POST['keyword']."%' || `pro_description` like  '%".$_POST['keyword']."%' ";
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
                	<div class="col-lg-3 pt-5">
                          <div class="product-details">
                            <div class="product-box">
                              <div class="gallery-part">
                                <div class="gallery"> 
                                <img src="<?php echo $database->base_url . $database->document_path_site_image . $proImageData['product_img']; ?>" width="260px;" height="200px;">
                                  <div class="hvr"> <i class="zmdi zmdi-zoom-in"></i> </div>
                                </div>
                              </div>
                              <div class="product-body">
                                <div class="product-title"> <a href="product_details.php?id=<?php echo $product['pro_id'];?>"><?php echo $product['pro_name'];?></a> </div>
                                <div class="product-content"> <a href="product_details.php?id=<?php echo $product['pro_id'];?>"><?php  $string =$product['pro_description'];
                                       $string = (strlen($string) > 20)?substr($string,0,100).'.....': $string;
                                       echo $string;
                                    ?></a></div>
                                <div class="product-action"> <a href="product_details.php?id=<?php echo $product['pro_id'];?>" class="read-btn">+Read more</a> 
                                <a href="#" class="get-btn" data-toggle="modal" data-target="#exampleModal<?php echo $product['pro_id'];?>" data-id="<?php echo $product['pro_id'];?>">Get a Quote</a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        

<div class="modal fade" id="exampleModal<?php echo $product['pro_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

      <div class="modal-body">
       <div class="modal-form">

           <form id="productEnquiryForm<?php echo $product['pro_id']; ?>">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" name="cst_name" id="formName" required>
                    <input type="hidden" name="pro_id" value="<?php echo $product['pro_id']; ?>">
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
  
                     <div class="form-group">
                            <div class="col-md-6">
                                <input  class="form-control" placeholder="Enter Captcha" name="CaptchaInput" id="CaptchaInputPro<?php echo $product['pro_id']; ?>" class="textEntry" type="text" autocomplete="off">
                            </div>     
                            <div class="col-md-3">
                                <div id="CaptchaDivPro<?php echo $product['pro_id']; ?>" style="border: 1px solid #006280;padding: 10px;clear: both;color: #fff;float: left;margin-right: 15px;background-color: #006280;"></div>
                                <div>
                                    <input type="hidden" id="txtCaptchaPro<?php echo $product['pro_id']; ?>">
                                </div>  
                                <div class="col-md-1">          
                                    <div style="padding:10px;" onclick="refreshCaptchaPro<?php echo $product['pro_id']; ?>()">
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
document.getElementById("txtCaptchaPro<?php echo $product['pro_id']; ?>").value = code;
document.getElementById("CaptchaDivPro<?php echo $product['pro_id']; ?>").innerHTML = code;

function refreshCaptchaPro<?php echo $product['pro_id']; ?>(){

var a = Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';

document.getElementById("CaptchaInputPro<?php echo $product['pro_id']; ?>").value = '';

var code = a + b + c + d + e;
document.getElementById("txtCaptchaPro<?php echo $product['pro_id']; ?>").value = code;
document.getElementById("CaptchaDivPro<?php echo $product['pro_id']; ?>").innerHTML = code;
    
}
</script>                            
                        
                 <?php } } else { ?>
                 
                 <p>Please Search Again</p>
                 
                 
                 <?php }?>
                        
                <?php } else { ?>
                        <p style="color: red;margin-top: 10px;margin-left: 10px;">No Match Found</p>
                <?php } ?>
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
$sql ="SELECT * FROM `product_details` where `pro_name` like '%".$_POST['keyword']."%' || `pro_description` like  '%".$_POST['keyword']."%' ";
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

                  $('#productEnquiryForm<?php echo $v['pro_id']; ?>').find(('p[id="successMessageProductShow"]').css('display','none'));

                }, 8000);

            }

        });

    });

});

</script>
<?php  endforeach; ?>
<style>

    .page-item.active .page-link {

	color: #fff;

}

.page-item.active {

	background-color: #f60;

}

</style>
</body></html>