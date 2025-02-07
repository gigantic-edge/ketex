<?php 
include_once('header.php'); 
if(isset($_GET['id'])){
    $sql ="SELECT * FROM `awords` WHERE `id` = '".$_GET['id']."' ";
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
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add New Award</h3>
                    </div>
                    <?php if(isset($_SESSION['message'])){ ?> 
                        <p style="background-color: <?php echo $_SESSION['msgColor'];?>;color: #fff;padding: 10px;"><?php echo $_SESSION['message'];?></p>
                    <?php unset($_SESSION['message']); unset($_SESSION['msgColor']); } ?>   
                    <form role="form" id="addUser" action="awardData.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Award Year *</label>
                                        <input type="text" name="year" class="form-control required" required placeholder="Award Year"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['year'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <?php if(isset($_GET['id'])){?> 
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <img src="../upload/profile_image/<?php echo $employeeData['image'];?>" style="height: 80px;width: 80px;">
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Award Image *</label>
                                        <input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="400000" />
                                        <input type="file" name="award_image" class="form-control required"
                                        <?php if(isset($_GET['id'])){?> <?php } else { ?> required <?php } ?> onchange="upload_check()" id="file_id">
                                    </div>
                                </div>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Description *</label>
                                        <textarea name="description" class="form-control required" required><?php if(isset($_GET['id'])){ echo $employeeData['description'];?>" <?php } ?></textarea>
                                    </div>
                                </div>
                                
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <?php if(isset($_GET['id'])){ ?>
                            <input type="hidden" name="id" value="<?php echo $employeeData['id'];?>">
                            <input type="submit" class="btn btn-primary" name="submit" value="Update">
                            <?php } else { ?>
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                            <?php } ?>
                        </div>    
                    </form>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Award List </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th>Sr. No.</th>
                                  <th>Year</th>
                                  <th>Description</th>
                                  <th>Image</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$sql ="SELECT * FROM `awords` ORDER BY `year` ASC ";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

$i = '1';
foreach($rows as $row){
    
?>                    
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?php echo $row['year'];?></td>
                      <td><?php echo $row['description'];?></td>
                      <td><img src="../upload/profile_image/<?php echo $row['image'];?>" style="height: 80px;width: 80px;"></td>
                      <td><a href="?id=<?php echo $row['id'];?>" style="background-color: #00b3ff;color: #fff;padding: 5px;" ><i class="fa fa-pencil"></i> Edit</a><br><br>
                          <a style="background-color: red;padding: 5px;color: #fff;cursor:pointer;" 
                          onclick="javascript:RemoveData(<?php echo $row['id'];?>);"><i class="fa fa-trash"></i> Delete</a>
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
    </section>
    
</div>
  <!-- /.content-wrapper -->
  <?php include_once('footer.php'); ?>
<script>
    function RemoveData(id){
        if (confirm('Are You Sure To Delete Award?')) {
        $.ajax({
            type:'post',
            url:'deleteSingleData.php',
            data: 'tableName=awords&key=id&value='+id,
            success:function(msg){
                        alert('Award Deleted Successfully!');
                        location.reload();
                       }
                });
        }
 }
function upload_check()
{
    var upl = document.getElementById("file_id");
    var max = document.getElementById("max_id").value;

    if(upl.files[0].size > max)
    {
       alert("Uploaded File Size Is Big!");
       upl.value = "";
    }
};
</script>  
        <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
            <script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="plugins/datatables/plugins/bootstrap/dataTables.bootstrap.min.js" type="text/javascript"></script>
            
  
<script type="text/javascript" src="bootstrap/js/common.js" charset="utf-8"></script>