<?php 
include_once('header.php'); 
if(isset($_GET['id'])){
    $sql ="SELECT * FROM `notice_board` WHERE `id` = '".$_GET['id']."' ";
    $query2 = $conn->query($sql);
    $employeeData = $query2->fetch(PDO::FETCH_LAZY);
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 410px;">
    <!-- Content Header (Page header) -->
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
        
            <div class="col-md-12">
                <a style="background-color: #00b3ff;color: #fff;padding: 5px;" href="addNotice.php"><i class="fa fa-plus"></i> Add Notice</a>
                
            <a style="background-color: red;color: #fff;padding: 5px;display:none;cursor:pointer" id="deleteBtn"><i class="fa fa-trash"></i> Delete Notice</a>
                <div class="box" style="margin-top: 10px;">
                    <div class="box-header">
                        <h3 class="box-title">Notice Board List </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th><a id="select_all">Select_All</a><br><a id="unselect_all">Unselect</a></th>
                                  <th>Sr. No.</th>
                                  <th>Notice Title</th>
                                  <th>Image</th>
                                  <th>Notice PDF</th>
                                  <th>Notice Date</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$sql ="SELECT * FROM `notice_board` ORDER BY `id` ASC ";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

$i = '1';
foreach($rows as $row){
    
?>                    
                    <tr>
                      <th><input type="checkbox" class="checkBoxProducts" id="Checkbox1" name="selectedProduct[]" value="<?php echo $row['id'];?>" /></th>
                      <td><?= $i; ?></td>
                      <td><?php echo $row['title'];?></td>
                      <td><img src="../upload/profile_image/<?php echo $row['image'];?>" style="height: 80px;width: 80px;"></td>
                      <td><?php if($row['pdf'] != ''){ ?>
                      <a href="../upload/profile_image/<?php echo $row['pdf'];?>" target="_blank" style="background-color: #00b3ff;padding: 5px;color: #fff;">View_PDF</a>
                      <?php } ?></td>
                      <td><?php echo $row['date'];?></td>
                      <td><a href="addNotice.php?id=<?php echo $row['id'];?>" style="background-color: #00b3ff;color: #fff;padding: 5px;" >Edit</a></td>
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
    </section>
    
</div>
  <!-- /.content-wrapper -->
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
        if (confirm('Are You Sure To Delete Selected Notices?')) {
        var myCheckboxes = new Array();
        $(".checkBoxProducts:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
        
        $.ajax({
            type: "POST",
            url: "deleteMultipleData.php",
            dataType: 'html',
            data: 'tableName=notice_board&key=id&myCheckboxes='+myCheckboxes,
            success: function(data){
                alert('Notices Deleted Successfully!');
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