<?php 
include_once('header.php'); 
if(isset($_GET['id'])){
    $sql ="SELECT * FROM `ketex_clients` WHERE `id` = '".$_GET['id']."' ";
    $query2 = $conn->query($sql);
    $clientData = $query2->fetch(PDO::FETCH_LAZY);
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
                        <h3 class="box-title">Add New Client</h3>
                    </div>
                    <?php if(isset($_SESSION['message'])){ ?> 
                        <p style="background-color: <?php echo $_SESSION['msgColor'];?>;color: #fff;padding: 10px;"><?php echo $_SESSION['message'];?></p>
                    <?php unset($_SESSION['message']); unset($_SESSION['msgColor']); } ?>   
                    <form role="form" id="addUser" action="clientData.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="cname">Client Name *</label>
                                        <input type="text" name="cname" class="form-control" placeholder="Client Name"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $clientData['client_name'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <?php if(isset($_GET['id'])){?> 
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <img src="../upload/profile_image/<?php echo $clientData['client_image'];?>" style="max-height: 100px;max-width: 100px;">
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="clogo">Client Logo*</label>
                                        <input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="400000" />
                                        <input type="file" name="clogo" class="form-control required"
                                        <?php if(isset($_GET['id'])){?> <?php } else { ?> required <?php } ?> onchange="upload_check()" id="file_id">
                                    </div>
                                </div>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="cdescription">Client Description *</label>
                                        <textarea name="cdescription" placeholder="Client Description" class="form-control"><?php if(isset($_GET['id'])){ echo $clientData['client_description'];?> <?php } ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="sort_num">Sort Number *</label>
                                        <input type="tel" name="sort_number" required class="form-control" placeholder="Sort Number"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $clientData['sort_number'];?>" <?php } ?>>
                                    </div>
                                </div>
                                
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <?php if(isset($_GET['id'])){ ?>
                            <input type="hidden" name="id" value="<?php echo $clientData['id'];?>">
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
                        <h3 class="box-title">Client List </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th>Sr. No.</th>
                                  <th>Client Name</th>
                                  <th>Description</th>
                                  <th>Client Logo</th>
                                  <th>Sort Number</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$sql ="SELECT * FROM `ketex_clients` ORDER BY `sort_number` ASC ";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

$i = '1';
foreach($rows as $row){
    
?>                    
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?php echo $row['client_name'];?></td>
                      <td><?php echo $row['client_description'];?></td>
                      <td><img src="../upload/profile_image/<?php echo $row['client_image'];?>" style="max-height: 100px;max-width: 100px;"></td>
                      <td><?php echo $row['sort_number'];?></td>
                      <td><a href="?id=<?php echo $row['id'];?>" style="background-color: #00b3ff;color: #fff;padding: 5px;" ><i class="fa fa-pencil"></i> Edit</a><br><br>
                          <!--<a style="background-color: red;padding: 5px;color: #fff;cursor:pointer;" -->
                          <!--onclick="javascript:RemoveData(<?php echo $row['id'];?>);"><i class="fa fa-trash"></i> Delete</a>-->
                          <a onClick="return confirm('Do you want to delete?')" href="deleteclientData.php?id=<?php echo $row['id'];?>" style="background-color: red;color: white;padding: 5px;" ><i class="fa fa-pencil"></i> Delete</a>
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
            url:'deleteclientData.php',
            data: 'tableName=ketex_clients&key=id&value='+id,
            success:function(msg){
                        alert('Client Deleted Successfully!');
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