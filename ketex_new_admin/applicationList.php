<?php include_once('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content"> 
        <div class="row">
            <div class="col-xs-12">
            <a style="background-color: #00b3ff;color: #fff;padding: 5px;" href="addApplication.php"><i class="fa fa-plus"></i> Add Application</a>
            
            <a style="background-color: red;color: #fff;padding: 5px;display:none;cursor:pointer" id="deleteBtn"><i class="fa fa-trash"></i> Delete Application</a>
                <div class="box" style="margin-top: 10px;">
                    <div class="box-header">
                        <h3 class="box-title">Application List </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th><a id="select_all">Select_All</a><br><a id="unselect_all">Unselect</a></th>
                                  <th>Sr. No.</th>
                                  <th>Category</th>
                                  <th>Name</th>
                                  <th>Description</th>
                                  <th>Image</th>
                                  <th>Created At</th>
                                  <th>Updated At</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$sql ="SELECT * FROM `application_details` ORDER BY `app_name` ASC ";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

$i = '1';
foreach($rows as $row){
    
    $sql ="SELECT * FROM `application_category` WHERE `cat_id` = '".$row['cat_id']."' ";
    $query2 = $conn->query($sql);
    $categoryData = $query2->fetch(PDO::FETCH_LAZY);
?>                    
                    <tr>
                        <th><input type="checkbox" class="checkBoxProducts" id="Checkbox1" name="selectedProduct[]" value="<?php echo $row['app_id'];?>" /></th>
                      <td><?= $i; ?></td>
                      <td><?php echo $categoryData['cat_name'];?></td>
                      <td><?php echo $row['app_name'];?></td>
                      <td><?php echo $row['app_description'];?></td>
                      <td><img src="../upload/profile_image/<?php echo $row['app_image'];?>" style="height: 80px;width: 80px;"></td>
                      <td><?php echo $row['created_at'];?></td>
                      <td><?php echo $row['updated_at'];?></td>
                      <td><a href="addApplication.php?id=<?php echo $row['app_id'];?>" style="background-color: #00b3ff;color: #fff;padding: 5px;">Edit</a></td>
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
        if (confirm('Are You Sure To Delete Selected Application?')) {
        var myCheckboxes = new Array();
        $(".checkBoxProducts:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
        
        $.ajax({
            type: "POST",
            url: "deleteMultipleData.php",
            dataType: 'html',
            data: 'tableName=application_details&key=app_id&myCheckboxes='+myCheckboxes,
            success: function(data){
                alert('Application Deleted Successfully!');
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
