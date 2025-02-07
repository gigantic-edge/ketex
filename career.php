<!doctype html>

<html lang="en">
<style>
.ex2 {
  background-color: lightblue;
  width: 110px;
  height: 110px;
  overflow: hidden;
}
</style>


<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>Ketex</title>



    <?php include 'assets/inc/header.php';?>





    <!-- ********|| BANNER STARTS ||******** -->

    <section class="banner">


        <div class="banner-box">

            <div id=owldemo1 class="owl-carousel owl-theme">

                <div class="item">

                    <div class="about-img">

                        <img class="img-fluid" src="assets/img/development_banner.jpg" alt="">

                    </div>

                </div>

                <div class="item">

                    <div class="about-img">

                        <img class="img-fluid" src="assets/img/rndpage_banner2.jpg" alt="">

                    </div>

                </div>

            </div>

        </div>

        <!--                  </div> -->

        <!--              </div>-->

        <!--          </div>-->

    </section>

    <!-- ********|| BANNER ENDS ||******** -->



    <!-- ********|| FACILITY STARTS ||******** -->

    <section class="facility-sec">

        <div class="container">

            <div class="row">

                <div class="col-lg-4">
<?php 
$sql ="SELECT * FROM `job_details`  ORDER BY `job_details`.`sort_number` ASC";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);
?>                     

                    <div class="careerpage_left" id="ex2">
                    	<h3>Current Opening</h3>
                    	<?php
                    	foreach($rows as $row){
                    	?>
                        
                        <ul>
                        	<li><strong>Job Title</strong> : <?php echo $row['job_name']; ?><br><br>
                        	<strong>Job Description</strong> : <?php echo $row['job_detail']; ?>
                        	</li>
                            
                        </ul>
                        <?php
                    	}
                        ?>
                    </div>

                </div>
				
                <div class="col-lg-8">
                    <div class="careerpage_right">
                    	<!--<h2>We are hiring</h2>-->
                        <form id="formCareerEnquiry">
                        	<div class="row">
                            	<div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="formFirstName" name="first_name" placeholder="First Name *" required>
                                </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="formLastName" name="last_name" placeholder="Last Name *" required>
                                </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
                                	<input type="email" class="form-control" id="formEmail" name="email" placeholder="Email *" required>
                              	</div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="formPhone" name="phone" placeholder="Phone *" required>
                                </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="formexpericence" name="year_exp" placeholder="Years of experience *" required>
                                </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group select">
                                        <select class="form-control" id="formjobid" name="job_data" required >
                                            <option value="">Select</option>
                                    	<?php
                        	                foreach($rows as $row){
                        	            ?>    
                                          <option value="<?php echo $row['job_id'] ?>"><?php echo $row['job_name'] ?></option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                     </div>
                                </div>
                                <div class="col-lg-12">
                                	<div class="form-group">
                                    	<label for=""><strong><span style="color:red;padding-left: 12px;font-size: 14px;">Upload CV only in PDF format within 800 KB *</span></strong></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="pdf" id="formpdf" accept="application/pdf" required>
                                            <!--<input type="hidden" name="MAX_FILE_SIZE5" value="40000" />-->
                                            <label class="custom-file-label" for="customFile">Upload here</label>
                                        </div>
                                     </div>
                                </div>
                                <div class="col-lg-12">
                                	<div class="form-group">
                                	<textarea class="form-control" placeholder="Message" name="message" id="formMessage"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                <div class="form-group">
                                            
                                            	<div class="row">
                                                    <div class="col-md-6">
                                                    <input class="form-control" placeholder="Enter Captcha" name="CaptchaInput" id="CaptchaInputCareer" class="textEntry" type="text" autocomplete="off">
                                                    </div>
                                                <div class="col-md-3">
                                                    <div id="CaptchaDivHome1" style="border: none;height: 45px;width: 130px;display: flex;justify-content: center;align-items: center;clear: both;color: #fff;float: left;margin-right: 15px;background-color: #006280;margin-top: 10px;"></div>
    
                                                    <div>
                                                        <input type="hidden" id="txtCaptchaHome">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="career-capcha" style="padding:10px;" onclick="refreshCaptchaHome()">
                                                            <img name="" id="" src="https://www.freeiconspng.com/thumbs/refresh-icon/refresh-icon-0.png" style="width:40px;" tabindex="0" />
                                                        </div>
                                                    </div>
                                                </div>
                                                	<div class="col-md-3">
                                                    	<button type="submit" class="career-sub-btn">Submit</button>
                                                    </div>
                                            	</div>
                                            </div>
                                </div>

                                        <p style="background-color: green; color: rgb(255, 255, 255); padding: 10px 10px 10px 21px; display: none; margin-top: 10px;margin-bottom: -20px;" id="successMessageShowIndex">
                                            Your Job Enquiry Send Successfully, Thank You!</p>
                                <!--<div class="col-lg-12">-->
                                <!--	<button type="submit" class="btn btn-default">Submit</button>-->
                                <!--</div>-->
                          
                          </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- ********|| FACILITY ENDS ||******** -->



 





    <?php include 'assets/inc/footer.php';?>
    <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
    <script>
    jQuery(document).ready(function(){
        jQuery('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            //alert('The file "' + fileName +  '" has been selected.');
        });
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
        document.getElementById("CaptchaDivHome1").innerHTML = code;

        function refreshCaptchaHome() {

            var a = Math.ceil(Math.random() * 9) + '';
            var b = Math.ceil(Math.random() * 9) + '';
            var c = Math.ceil(Math.random() * 9) + '';
            var d = Math.ceil(Math.random() * 9) + '';
            var e = Math.ceil(Math.random() * 9) + '';

            document.getElementById("CaptchaInputCareer").value = '';

            var code = a + b + c + d + e;
            document.getElementById("txtCaptchaHome").value = code;
            document.getElementById("CaptchaDivHome1").innerHTML = code;

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
    
<script language="javascript" type="text/javascript">



</script>



    </body>



</html>

