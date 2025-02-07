<?php include_once('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content"> 
        <div class="row">
            <div class="col-xs-12">
                    <?php if(isset($_SESSION['message'])){ ?>
                        <p style="background-color: <?php echo $_SESSION['msgColor'];?>;color: #fff;padding: 10px;"><?php echo $_SESSION['message'];?></p>
                    <?php unset($_SESSION['message']); unset($_SESSION['msgColor']); } ?>   
                    
                    <?php if(isset($_SESSION['productUploadError'])){ ?>
                        <p style="background-color: red;color: #fff;padding: 10px;"><?php echo $_SESSION['productUploadError'];?></p>
                    <?php unset($_SESSION['productUploadError']); } ?>
            
                <div class="box" style="margin-top: 10px;">
                    <div class="box-header">
                        <h3 class="box-title">Job Enquiry List </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  
                                  <th>Sr. No.</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>Experience(Year)</th>
                                  <th>Apply For</th>
                                  <th>PDF</th>
                                  <th>Message</th>
                                  <th>Added on</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$sql ="SELECT career_enquiry.* ,job_details.job_name FROM `career_enquiry` INNER JOIN job_details on job_details.job_id=career_enquiry.job_id";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);


$i = '1';
foreach($rows as $row){
    
    // $sql ="SELECT * FROM `job_details` WHERE `job_id` = '".$row['enquiry_id']."' ";
    // $query2 = $conn->query($sql);
    // $categoryData = $query2->fetch(PDO::FETCH_LAZY);
    // print_r($categoryData);
    // exit();
?>                    
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?php echo $row['first_name'];?></td>
                      <td><?php echo $row['last_name'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['phone'];?></td>
                      <td><center><?php echo $row['year_exp'];?></center></td>
                      <td><?php echo $row['job_name'] ?></td>
                      <td><?php if($row['pdf'] != ''){ ?>
                      <a href="../upload/profile_image/<?php echo $row['pdf'];?>" target="_blank" style="background-color: #00b3ff;padding: 5px;color: #fff;">View_PDF</a>
                      <?php } ?></td>
                      <td><?php echo strlen(strip_tags($row['message'])) > 10 ? substr(strip_tags($row['message'],'<br>'),0,10)."..." : strip_tags($row['message'],'<br>'); ?></td>
                      <td><?php echo $row['created_at'];?></td>
                      <td>
                      <a onClick="return confirm('Do you want to delete?')" href="deletejob_enquiry.php?id=<?php echo $row['enquiry_id'];?>" style="background-color: red;padding: 5px;color: white;">Delete</a>
                      </td>
                    </tr>
 <?php $i++; } ?> 
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<?php include_once('footer.php'); ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
            $('.checkBoxProducts').each(function(){
                this.checked = true;
            });
            $("#deleteBtn").css('display','inline');
    });
    
    $('#unselect_all').on('click',function(){
            $('.checkBoxProducts').each(function(){
                this.checked = false;
            });
            $("#deleteBtn").css('display','none');
    });
    
    $('.checkBoxProducts').on('click',function(){
        if(this.checked){
            $("#deleteBtn").css('display','inline');
        }
        if($('.checkBoxProducts:checked').length == 0){
            $("#deleteBtn").css('display','none');
        }
            
    });
    
    $('#deleteBtn').on('click',function(){
        if (confirm('Are You Sure To Delete Selected Products?')) {
        var myCheckboxes = new Array();
        $(".checkBoxProducts:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
        
        $.ajax({
            type: "POST",
            url: "deleteMultipleData.php",
            dataType: 'html',
            data: 'tableName=product_details&key=pro_id&myCheckboxes='+myCheckboxes,
            success: function(data){
                alert('Products Deleted Successfully!');
                $('.checkBoxProducts').each(function(){
                    this.checked = false;
                });
                location.reload();
            }
        });
        }
    });
    
    
});
</script>
