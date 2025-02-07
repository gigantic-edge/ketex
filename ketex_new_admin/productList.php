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
            <a style="background-color: #00b3ff;color: #fff;padding: 5px;" href="addProduct.php"><i class="fa fa-plus"></i> Add Product</a>
              
            <a style="background-color: red;color: #fff;padding: 5px;display:none;cursor:pointer" id="deleteBtn"><i class="fa fa-trash"></i> Delete Products</a>
            
                <div class="box" style="margin-top: 10px;">
                    <div class="box-header">
                        <h3 class="box-title">Product List </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th><a id="select_all">Select_All</a><br><a id="unselect_all">Unselect</a></th>
                                  <th>Sr. No.</th>
                                  <th>Category</th>
                                  <th>Name</th>
                                  <th>Product Description</th>
                                  <th>Sort Number</th>
                                  <th>PDF Title</th>
                                  <th>PDF</th>
                                  <th>Created At</th>
                                  <th>Updated At</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$sql ="SELECT * FROM `product_details`  ORDER BY `product_details`.`sort_number` ASC";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

$i = '1';
foreach($rows as $row){
    
    $sql ="SELECT * FROM `product_category` WHERE `cat_id` = '".$row['cat_id']."' ";
    $query2 = $conn->query($sql);
    $categoryData = $query2->fetch(PDO::FETCH_LAZY);
?>                    
                    <tr>
                        <th><input type="checkbox" class="checkBoxProducts" id="Checkbox1" name="selectedProduct[]" value="<?php echo $row['pro_id'];?>" /></th>
                      <td><?= $i; ?></td>
                      <td><?php echo $categoryData['cat_name'];?></td>
                      <td><?php echo $row['pro_name'];?></td>
                      <td><?php echo strlen(strip_tags($row['pro_description'])) > 100 ? substr(strip_tags($row['pro_description'],'<br>'),0,100)."..." : strip_tags($row['pro_description'],'<br>'); ?></td>
                      <td><?php echo $row['sort_number'];?></td>
                      <td><?php echo $row['product_pdf_title'];?></td>
                      <td><?php if($row['pdf'] != ''){ ?>
                      <a href="../upload/profile_image/<?php echo $row['pdf'];?>" target="_blank" style="background-color: #00b3ff;padding: 5px;color: #fff;">View_PDF</a>
                      <a href="deletepdf.php?id=<?php echo $row['pro_id'];?>" style="background-color: #00b3ff;padding: 5px;color: red;">Delete PDF</a>
                      <?php } ?></td>
                      <td><?php echo $row['created_at'];?></td>
                      <td><?php echo $row['update_at'];?></td>
                      <td>
                      <a href="addProduct.php?id=<?php echo $row['pro_id'];?>" style="background-color: #00b3ff;padding: 5px;color: #fff;"><i class="fa fa-pencil"></i> Edit</a><br><br>
                      <a href="manageImages.php?id=<?php echo $row['pro_id'];?>" target="_blank" style="background-color: #00b3ff;padding: 5px;color: #fff;">Manage_Images</a><br><br>
                      <a href="deleteproduct.php?id=<?php echo $row['pro_id'];?>" style="background-color: red;padding: 5px;color: white;">Delete</a>
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
