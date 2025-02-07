<!-- ********|| FOOTER STARTS ||******** -->
<div class="modal fade" id="exampleModal111" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Send An Enquiry</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
            <p style="background-color: green;color: #fff;padding: 10px;padding-left: 21px;display:none;" id="successMessageShow">Your Enquiry Send Successfully ,Thank You!</p>
         <div class="modal-body enquiry_from">
            <div class="modal-form">
               <form id="exampleModal111Form" name="exampleModal111Form">
                  <div class="form-group">
                     <input type="text" class="form-control" placeholder="Name" id="formName33" name="cst_name" required>
                     <input type="hidden" name="pro_id" value="<?php echo $_GET['id'] ?>">
                  </div>
                  <div class="form-group">
                     <input type="email" class="form-control" placeholder="Email" name="email" id="formEmail33" required>
                  </div>
                  <div class="form-group">
                     <input type="number" class="form-control" placeholder="Phone" name="phn_number" id="formPhone33" required pattern="[6-9]{1}[0-9]{9}">
                  </div>
                  <div class="form-group">
                     <textarea class="form-control" placeholder="Message" rows="3" name="message" id="formMessage33" required></textarea>
                  </div>
                    <!---<div class="g-recaptcha" data-sitekey="<?php echo $publickey; ?>" id="g-recaptcha-response"></div>-->
                    
                     <div class="form-group">
                            <div class="col-md-6 pl-0 mb-2">
                                <input  class="form-control" placeholder="Enter Captcha" name="CaptchaInput" id="CaptchaInputIndex" class="textEntry" type="text" autocomplete="off">
                            </div>     
                            <div class="col-md-3 pl-0">
                                <div id="CaptchaDivIndex" style="border: none;height: 45px;width: 102px;display: flex;justify-content: center;align-items: center;clear: both;color: #fff;float: left;margin-right: 15px;background-color: #006280;margin-top: 10px;"></div>
                                <div>
                                    <input type="hidden" id="txtCaptchaIndex">
                                </div>  
                                <div class="col-md-1">          
                                    <div class="career-capcha" style="padding:10px;" onclick="refreshCaptchaIndex()">
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
document.getElementById("txtCaptchaIndex").value = code;
document.getElementById("CaptchaDivIndex").innerHTML = code;

function refreshCaptchaIndex(){

var a = Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';

document.getElementById("CaptchaInputIndex").value = '';

var code = a + b + c + d + e;
document.getElementById("txtCaptchaIndex").value = code;
document.getElementById("CaptchaDivIndex").innerHTML = code;
    
}
</script>    
<!--    FOOTER STARTS-->
<section class="footerMenuBox">
   <div class="container">
      <div class="row">
         <div class="col-lg-3">
            <div class="footer-logo">
               <div class="brand">
                  <a href="<?php echo $database->base_url; ?>" class="logo">
                  <img class="img-fluid" src="assets/img/Ketex-logo-white-02.svg" alt="" title="Home">
                  </a>
               </div>
               
               <div class="dnb">
                         <p>An ISO 9001:2015 Company</p>
                    </div>
                
                    <div class="dnb">
                        <!--<a href="/" class="dnb-logo">
                            <img class="img-fluid" src="assets/img/logo-dnb.svg" alt="" title="Home">
                        </a>-->
                         <p>D&amp;B Trust no for our entity<br /> "DUNS 677574738"</p>
                    </div>

               <!-- <div class="brand">
                  <a href="#!" class="logo">
                  <img class="img-fluid" src="assets/img/logo-dnb.png" alt="" title="Home">
                  </a>
               </div> -->
               <ul>
                  <li><a href="https://www.facebook.com/Ketextechnicaltextile" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                  <li><a href="https://twitter.com/KetexSil" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
                  <li><i class="zmdi zmdi-linkedin"></i></li>
               </ul>
            </div>
         </div>
         <!--                   <div class="fmenuRow">-->
         <div class="col-lg-2 fMenucol">
            <div class="leftMenuRow">
               <div class="leftMenuCol">
                  <ul id="nav" class="m-0">
                     <li><a href="<?php echo $database->base_url; ?>index.php">Home</a></li>
                     <li><a href="<?php echo $database->base_url; ?>about_us.php">About us</a></li>
                     <li><a href="<?php echo $database->base_url; ?>product_listing.php">Products</a></li>
                      <li><a href="<?php echo $database->base_url; ?>development.php">Developments</a></li>
                     <!--<li><a href="../ketex-html/application.php">Application</a></li> -->
                     <li><a href="<?php echo $database->base_url; ?>contact_us.php">Contact Us</a></li>
                     <li><a href="<?php echo $database->base_url; ?>career.php">Career</a></li>
                     <!-- <li><a href="../ketex-html/notice_board.php">Notice Board</a></li> -->
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-7">
            <div class="title-inner">
               <div class="title">Contact Us</div>
            </div>
            <div class="footer-contact">
               <div class="contact-inner">
                  <div class="contact-title">HEAD OFFICE</div>
                  <div class="contact-content">
                     Plot No 71, Salua Road, Prembazar,<br> P.O. Hijli Co-opertive Society Prem Bazar, <br>Kharagpur, 721306, West Bengal, INDIA
                        <!-- <div class="contact-name">
                        	Mr. Sukumar Roy<br> (Managing Director)
                      	</div> -->
                        <div class="contact-info">
                         <a href="mailto:info@ketex.com" class="contact-link"><i class="zmdi zmdi-email"></i> info@ketex.com</a>
<!--                         <span>|</span>-->
                         <a href="tel:+913222277285" class="contact-link"><i class="zmdi zmdi-phone"></i> +91 3222 277285</a>
                      	</div>
                  </div>
                  
                  
               </div>
<!--
               <div class="contact-inner">
                  <div class="contact-title">PRODUCTION UNIT</div>
                  <div class="contact-content product_margin">
                     P.O. Jakpur, Vill: Rupnarayanpur NH: 06 &amp; 60 Junction, <br> Vill: Rupnarayanpur, KHARAGPUR, 721301, West Bengal, INDIA
                        <div class="contact-info">
                             <a href="mailto:info@ketex.com" class="contact-link"><i class="zmdi zmdi-email"></i> info@ketex.com</a>
                         <a href="tel:+913222291521" class="contact-link"><i class="zmdi zmdi-phone"></i> +91 3222 291521</a>
                         <a href="tel:+913222291522" class="contact-link"><i class="zmdi zmdi-phone"></i> +91 3222 291522</a>
                         <a href="tel:+913222291013" class="contact-link"><i class="zmdi zmdi-phone"></i> +91 3222 291013</a>
                      	</div>
                        </div>
                  </div>
-->
                       <div class="contact-inner">
                  <div class="contact-title">SUPPORT</div>
                  <div class="contact-content product_margin">
                      <div class="support-title">Sales: Mr. Gurmeet Singh Dhani – Sr. Manager Sales</div>
                      <div class="contact-info">
                          <a href="tel:+919933013165" class="contact-link"><i class="zmdi zmdi-phone"></i> +91 99330 13165</a>
                             <a href="mailto:sales@ketex.com" class="contact-link mail"><i class="zmdi zmdi-email"></i> sales@ketex.com</a>
                      	</div>
                      <div class="support-inner">
                            <ul>
                                <li>Fiberglass Division – Global</li>
                                <li>Gauntlet Division – Global (Except Indian Sub-Continent)</li>
                            </ul>
                      </div>
                      
                         <div class="support-title">Mr. Abhisek Chatterjee – Sr. Manager Sales </div>
                      <div class="contact-info">
                          <a href="tel:+919800121549" class="contact-link"><i class="zmdi zmdi-phone"></i> +91 98001 21549</a>
                             <a href="mailto:sales@ketex.com" class="contact-link mail"><i class="zmdi zmdi-email"></i> sales@ketex.com</a>
                      	</div>
                      <div class="support-inner">
                            <ul>
                                <li>Gauntlet Division –Indian Sub-Continent</li>
                            </ul>
                      </div>
                      
                      <div class="support-title support-title-2">Procurement: Mr. Manish Kumar Singh <br> Asst. Manager Purchase</div>
                      <div class="support-inner">
                           <div class="contact-info">
                               <a href="tel:+919800710270" class="contact-link"><i class="zmdi zmdi-phone"></i> +91 98007 10270</a>
                             <a href="mailto:purchase@ketex.com" class="contact-link mail"><i class="zmdi zmdi-email"></i> purchase@ketex.com</a>
                      	</div> 
                            <ul>
                                <li>Kharagpur Division </li>
                            </ul>
                      </div>
                      
                      	
                       
                        </div>
                  </div>
                  
                  
               </div>
            </div>
         </div>
         <!--                </div>-->
      </div>
</section>
<!--    FOOTER ENDS-->
<!-- ********|| COPY STARTS ||******** -->
<section class="copy-sec">
   <div class="container">
      <div class="copy-inner">
         <div class="design">
            All right reserved: Amer-Sil Ketex Private Limited © <?php echo date("Y"); ?>
         </div>
         <div class="copy-info">
            Design &amp; Developed by <span> <a href="https://keylines.net/" target="_blank" >Keyline</a></span>
         </div>
      </div>
   </div>
</section>
<!-- ********|| COPY ENDS ||******** -->
<!-- ********|| STICKY SEC STARTS ||******** -->
<section class="sticky-sec">
   <div class="book">
      <a href="#" class="book-btn">
      <img class="img-fluid" src="assets/img/book.svg">
      </a>
   </div>
   <div class="form-part">
      <button type="button" class="btn-form" data-toggle="modal" data-target="#exampleModal111">
      <img class="img-fluid" src="assets/img/form.svg">
      </button>
   </div>
</section>
<!-- ********|| STICKY SEC ENDS ||******** -->
<!-- ********|| MODAL STARTS ||******** -->
<section class="sticky-modal">
   <!-- Button trigger modal -->
   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <!--        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="modal-form">
                  <form>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name">
                     </div>
                     <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email">
                     </div>
                     <div class="form-group">
                        <input type="email" class="form-control" placeholder="Phone">
                     </div>
                     <div class="form-group">
                        <textarea class="form-control" placeholder="Message" rows="3"></textarea>
                     </div>
                     <button type="submit" class="submit-btn">Submit</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<?php /*?><script>
jQuery(document).ready(function(){
setTimeout(function() {
  jQuery('body')
    .removeClass('loading')
    .addClass('loaded');
}, 2000);
});
</script><?php */?>
<script type="text/javascript">
$(document).ready(function(){
    $('#exampleModal111Form').submit(function(e){
        e.preventDefault();
        var captchaCode = $('#exampleModal111Form').find('input[id="txtCaptchaIndex"]').val();
        var CaptchaInput = $('#exampleModal111Form').find('input[id="CaptchaInputIndex"]').val();
        if(CaptchaInput == ''){
            alert('Please Enter Captcha Code'); return false;
        } 
        if(CaptchaInput != captchaCode){
            alert('Please Enter Valid Captcha Code'); return false;
        } 
        $.ajax({
            url: "db_enquiry.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(data){
                $("#formName33").val('');
                $("#formEmail33").val('');
                $("#formPhone33").val('');
                $("#formMessage33").val('');
                $("#successMessageShow").css('display','block');
                setTimeout(function(){
                  $('#successMessageShow').css('display','none');
                  $("#exampleModal111").modal("hide");
                }, 3000);
            }
        });
    });
    $('#sendEnquiryForm').submit(function(e){
        e.preventDefault();
        var captchaCode = $('#sendEnquiryForm').find('input[id="txtCaptcha"]').val();
        var CaptchaInput = $('#sendEnquiryForm').find('input[id="CaptchaInput"]').val();
        if(CaptchaInput == ''){
            alert('Please Enter Captcha Code'); return false;
        } 
        if(CaptchaInput != captchaCode){
            alert('Please Enter Valid Captcha Code'); return false;
        } 
        $.ajax({
            url: "db_enquiry.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(data){
                $("#formName1").val('');
                $("#formEmail1").val('');
                $("#formPhone1").val('');
                $("#formMessage1").val('');
                $("#exampleFormControlSelect1").val('');
                $("#formSubject1").val('');
                $("#successMessageShowIndex").css('display','block');
                setTimeout(function(){
                  $('#successMessageShowIndex').css('display','none');
                }, 8000);
            }
        });
    });
    
    /*
    $('#productEnquiryForm').submit(function(e){
        e.preventDefault();
        var dataValue = $(this).serializeArray();
        alert(dataValue);
        return false;
        $.ajax({
            url: "db_enquiry_product.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(data){
                $("#formName").val('');
                $("#formEmail").val('');
                $("#formPhone").val('');
                $("#formMessage").val('');
                $("#successMessageProductShow").css('display','block');
                setTimeout(function(){
                  $('#successMessageProductShow').css('display','none');
                }, 8000);
            }
        });
    });
    */
       $("#mySearch").keyup(function() {
       var name = $('#mySearch').val();
       if (name == "") {
           $("#search_display").html("");
       }
       else {
           $.ajax({
               type: "POST",
               url: "searchResult.php",
               data: {
                   search: name
               },
               success: function(html) {
                   $("#search_display").html(html).show();
               }
           });
       }
   });
});
</script>


<script>
    $('#formCareerEnquiry').submit(function(e){
        e.preventDefault();
        var captchaCode = $('#formCareerEnquiry').find('input[id="txtCaptchaHome"]').val();
        var CaptchaInput = $('#formCareerEnquiry').find('input[id="CaptchaInputCareer"]').val();
        if(CaptchaInput == ''){
            alert('Please Enter Captcha Code'); return false;
        } 
        if(CaptchaInput != captchaCode){
            alert('Please Enter Valid Captcha Code'); return false;
        }
        var formData = new FormData(this);
        $.ajax({
            url: "db_career_enquiry.php",
            type: "POST",
            data: formData,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "JSON",
            success: function(data){
                // $("#formFirstName").val('');
                // $("#formLastName").val('');
                // $("#formEmail").val('');
                // $("#formPhone").val('');
                // $("#formexpericence").val('');
                // $("#formjobid").val('');
                // $("#formpdf").val('');
                // $("#formMessage").val('');
                // $("#exampleFormControlSelect1").val('');
                $("#successMessageShowIndex").css('display','block');
                setTimeout(function(){
                  $('#successMessageShowIndex').css('display','none');
                }, 8000);
            }
        });
    });
</script>
<?php 
$productlist = [];
if (is_array($productlist) || is_object($productlist))
{
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
<?php  endforeach; 
}
?>
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
<?php 
$sql ="SELECT * FROM `product_details` where `pro_name` != ''";
$query2 = $conn->query($sql);
$productData = $query2->fetchAll(PDO::FETCH_ASSOC); 
//print_r($productData);
$allProductsData = array(); 
foreach ($productData as $k => $v){ 
    
    $allProductsData[] = $v['pro_name'];
    
}
$allProductsDataNew = '"'.implode('","', $allProductsData).'"';
//echo $allProductsDataNew;
?>

var countries = [<?php echo $allProductsDataNew;?>];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>

<!-- ********|| MODAL STARTS ||******** -->
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<script defer="defer" type="text/javascript" src="assets/js/script.js"></script>
<!------------OWL------------>
<script src="assets/owl/owl-min.js"></script>
<!------------AOS ANIMATION------------>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!------------fancybox------------>
      <script defer="defer" type="text/javascript" src="assets/fancybox/jquery.fancybox.min.js"></script>
<script>
   AOS.init();
   document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<!--
<script>
  AOS.init();
</script>
-->
<script>
   $("#owldemo1").owlCarousel({
   
   loop: true,
   
   margin: 10,
   
   autoplay: true,
   
   autoplayTimeout: 6000,
   
   autoplayHoverPause: true,
   
   navText: ["<i class='zmdi zmdi-chevron-left'></i>", "<i class='zmdi zmdi-chevron-right'></i>"],
   
   responsive: {
   
   0: {
   
       items: 1,
   
       dots: true,
   
       nav: false,
   
   },
   
   600: {
   
       items: 1,
   
       dots: true,
   
       nav: false,
   
   },
   
   1000: {
   
       items: 1,
   
       margin: 20,
   
       nav: false,
   
       dots: true,
   
   }
   
   }
   
   });
   
</script>
<script>
   $("#owldemo2").owlCarousel({
   
   loop: true,
   
   margin: 10,
   
       nav: true,
   
   autoplay: true,
   
   autoplayTimeout: 5000,
   
   autoplayHoverPause: true,
   
   navText: ["<i class='zmdi zmdi-chevron-left'></i>", "<i class='zmdi zmdi-chevron-right'></i>"],
   
   responsive: {
   
   0: {
   
       items: 1,
   
       dots: false,
   
       nav: true,
   
   },
   
   600: {
   
       items: 2,
   
       dots: false,
   
       nav: true,
   
   },
   
   1200: {
   
       items: 3,
   
       margin: 20,
   
       nav: true,
   
       dots: false,
   
   },
   
   }
   
   });
   
</script>
<script>
   $("#owldemo3").owlCarousel({
   
   loop: true,
   
   margin: 10,
   
       nav: true,
   
   autoplay: true,
   
   autoplayTimeout: 5000,
   
   autoplayHoverPause: true,
   
   navText: ["<i class='zmdi zmdi-chevron-left'></i>", "<i class='zmdi zmdi-chevron-right'></i>"],
   
   responsive: {
   
   0: {
   
       items: 2,
   
       dots: false,
   
       nav: true,
   
   },
   
   600: {
   
       items: 4,
   
       dots: false,
   
       nav: true,
   
   },
   
   1200: {
   
       items: 6,
   
       margin: 20,
   
       nav: true,
   
       dots: false,
   
   },
   
   }
   
   });
           $("#partner-owl").owlCarousel({
   
   loop: true,
   
   margin: 10,
   
       nav: true,
   
   autoplay: true,
   
   autoplayTimeout: 2000,
   
   autoplayHoverPause: true,
   
   navText: ["<i class='zmdi zmdi-chevron-left'></i>", "<i class='zmdi zmdi-chevron-right'></i>"],
   
   responsive: {
   
   0: {
   
       items: 1,
   
       dots: false,
   
       nav: true,
   
   },
   360: {
   
       items: 2,
   
       dots: false,
   
       nav: true,
   
   },
   
   600: {
   
       items: 3,
   
       dots: false,
   
       nav: true,
   
   },
   
   1200: {
   
       items: 5,
   
       margin: 20,
   
       nav: true,
   
       dots: false,
   
   },
   
   }
   
   });
    
       $("#research").owlCarousel({
   
   loop: true,
   
   margin: 10,
   
       nav: true,
   
   autoplay: true,
   
   autoplayTimeout: 5000,
   
   autoplayHoverPause: true,
   
   navText: ["<i class='zmdi zmdi-chevron-left'></i>", "<i class='zmdi zmdi-chevron-right'></i>"],
   
   responsive: {
   
   0: {
   
       items: 1,
   
       dots: false,
   
       nav: true,
   
   },
   
   600: {
   
       items: 2,
   
       dots: false,
   
       nav: true,
   
   },
   
   1200: {
   
       items: 3,
   
       margin: 20,
   
       nav: true,
   
       dots: false,
   
   },
   
   }
   
   });
           $("#facility").owlCarousel({
   
   loop: true,
   
   margin: 10,
   
       nav: true,
   
   autoplay: true,
   
   autoplayTimeout: 5000,
   
   autoplayHoverPause: true,
   
   navText: ["<i class='zmdi zmdi-chevron-left'></i>", "<i class='zmdi zmdi-chevron-right'></i>"],
   
   responsive: {
   
   0: {
   
       items: 1,
   
       dots: false,
   
       nav: true,
   
   },
   
   600: {
   
       items: 3,
   
       dots: false,
   
       nav: true,
   
   },
   
   1200: {
   
       items: 4,
   
       margin: 20,
   
       nav: true,
   
       dots: false,
   
   },
   
   }
   
   });
               $("#home-journey").owlCarousel({
   
   loop: true,
   
   margin: 10,
   
       nav: true,
   
   autoplay: true,
   
   autoplayTimeout: 5000,
   
   autoplayHoverPause: true,
   
   navText: ["<i class='zmdi zmdi-chevron-left'></i>", "<i class='zmdi zmdi-chevron-right'></i>"],
   
   responsive: {
   
   0: {
   
       items: 1,
   
       dots: false,
   
       nav: true,
   
   },
   
   600: {
   
       items: 3,
   
       dots: false,
   
       nav: true,
   
   },
   
   1200: {
   
       items: 4,
   
       margin: 20,
   
       nav: true,
   
       dots: false,
   
   },
   
   }
   
   });

   $("#home-journey-2").owlCarousel({
   
   loop: true,
   animateOut: 'fadeOut',
   animateIn: 'fadeIn',
   margin: 10,
   
       nav: true,
   
   autoplay: true,
   
   autoplayTimeout: 5000,
   
   autoplayHoverPause: true,
   
   
   navText: ["<i class='zmdi zmdi-chevron-left'></i>", "<i class='zmdi zmdi-chevron-right'></i>"],
   
   responsive: {
   
   0: {
   
       items: 1,
   
       dots: false,
   
       nav: true,
   
   },
   
   600: {
   
       items: 3,
   
       dots: false,
   
       nav: true,
   
   },
   
   1200: {
   
       items: 4,
   
       margin: 20,
   
       nav: true,
   
       dots: false,
   
   },
   
   }
   
   });
   
</script>
<script type="text/javascript">
   $(document).ready(function () {
       var url = window.location;
       var str1 = url;
       var str2 = 'searchResult.php';
       $('ul#nav a[href="' + url + '"]').parent().addClass('active');
       // Will also work for relative and absolute hrefs
       $('ul#nav a').filter(function () {
           return this.href == url;
       }).parent().addClass('active');
       
   });
   
</script>
<script>
   if($(window).width() >= 1000){
   
       $('.start').on('click', function () {
   
           console.log("start clicked");
   
           $(this).hide();
           $('#myTab-circle').css({'opacity': '1', 'transform': 'scale(1)'});
   
           $('#myTabContent').css({'opacity': '1'});
   
       })
   }
   
   if($(window).width() < 1000){
   
       $('.start').hide();
   
   }
   
</script>
<script>
   //Arrange the icons in a circle centered in the div
   
   numItems = $("#myTab-circle li").length; //How many items are in the circle?
   
   start = 4.7; //the angle to put the first image at. a number between 0 and 2pi
   
   step = (2 * Math.PI) / numItems; //calculate the amount of space to put between the items.
   
   
   
   //Now loop through the buttons and position them in a circle
   
   $("#myTab-circle li").each(function (index) {
   
       radius = ($("#myTab-circle").width() - $(this).width()) / 2.11;
   
       tmpTop = (($("#myTab-circle").height() / 2) + radius * Math.sin(start)) - ($(this).height() / 2);
   
       tmpLeft = (($("#myTab-circle").width() / 2) + radius * Math.cos(start)) - ($(this).width() / 2);
   
       start += step;
       $(this).css("top", tmpTop);
   
       $(this).css("left", tmpLeft);
   
   });
   
</script>
<script>
   $(document).ready(function () {
   
   getAccordion("#myTab-circle", 1000);
   
   });
   
   function getAccordion(element_id,screen){
   
       // $(window).resize(function () { location.reload(); });
   
   
   
       if ($(window).width() < screen) {
   
           var concat = '';
   
           obj_tabs = $( element_id + " li" ).toArray();
   
           obj_cont = $( "#myTabContent.tab-content .tab-pane" ).toArray();
   
           jQuery.each( obj_tabs, function( n, val ) 
   
           {
   
               concat += '<div id="' + n + '" class="panel panel-default">';
   
               concat += '<div class="panel-heading" role="tab" id="heading' + n + '">';
   
               concat += '<h4 class="panel-title"><button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse' + n + '" aria-expanded="false" aria-controls="collapse' + n + '">' + val.innerText + '</button></h4>';
   
               concat += '</div>';
   
               concat += '<div id="collapse' + n + '" class="panel-collapse collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="heading' + n + '">';
   
               concat += '<div class="panel-body">' + obj_cont[n].innerHTML + '</div>';
   
               concat += '</div>';
   
               concat += '</div>';
   
           });
   
           $("#accordion").html(concat);
   
           $("#accordion").find('.panel-collapse:first').addClass("in");
   
           $("#accordion").find('.panel-title a:first').attr("aria-expanded","true");
   
           $(element_id).remove();
   
           $("#myTabContent.tab-content").remove();
   
       }	
   
   }
   
</script>
<script>

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 500) {
        $(".header").addClass("onscollheader");
    } else {
        $(".header").removeClass("onscollheader");
    }
});
</script>
<script>
    $(window).on('load', function(){

	setTimeout(function(){

		$('.preloader').addClass('inactive');

	}, 100);

	

});
</script>
<!--
<script>

$(window).on('load', function(){
	"use strict";
	setTimeout(function(){
		$('.preloader').addClass('inactive');
	}, 500);
	
});
</script>
-->
<!--
<script>
    function onReady(callback) {
    var intervalID = window.setInterval(checkReady, 1000);

    function checkReady() {
        if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalID);
            callback.call(this);
        }
    }
}

function show(id, value) {
    document.getElementById(id).style.display = value ? 'block' : 'none';
}

onReady(function () {
    show('page', true);
    show('loading', false);
});
</script>
-->

