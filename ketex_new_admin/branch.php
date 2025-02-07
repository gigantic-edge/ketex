<?php 
include_once('header.php'); 
if(isset($_GET['id'])){
    $sql ="SELECT * FROM `branches` WHERE `id` = '".$_GET['id']."' ";
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
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add New Branch</h3>
                    </div>
                    <?php if(isset($_SESSION['message'])){ ?> 
                        <p style="background-color: <?php echo $_SESSION['msgColor'];?>;color: #fff;padding: 10px;"><?php echo $_SESSION['message'];?></p>
                    <?php unset($_SESSION['message']); unset($_SESSION['msgColor']); } ?>   
                    <form role="form" id="addUser" action="branchData.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Map Iframe Code </label>
                                        <input type="text" name="map" class="form-control required" placeholder="Map Iframe Code"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['map'];?>" <?php } ?>>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Title *</label>
                                        <input type="text" name="title" class="form-control required" required placeholder="Title"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['title'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Address *</label>
                                        <input type="text" name="address" class="form-control required" required placeholder="Address"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['address'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Phone </label>
                                        <input type="text" name="phone" class="form-control required" placeholder="Phone"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['phone'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Fax </label>
                                        <input type="text" name="fax" class="form-control required" placeholder="Fax"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['fax'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Email </label>
                                        <input type="text" name="email" class="form-control required" placeholder="Email"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['email'];?>" <?php } ?>>
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
            
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Branch List </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th>Sr. No.</th>
                                  <th>Title</th>
                                  <th>Address</th>
                                  <th>Phone</th>
                                  <th>Fax</th>
                                  <th>Email</th>
                                  <th>Updated Date</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$sql ="SELECT * FROM `branches` ORDER BY `id` ASC ";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

$i = '1';
foreach($rows as $row){
    
?>                    
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?php echo $row['title'];?></td>
                      <td><?php echo $row['address'];?></td>
                      <td><?php echo $row['phone'];?></td>
                      <td><?php echo $row['fax'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['createdAt'];?></td>
                      <td><a href="?id=<?php echo $row['id'];?>" style="background-color: #00b3ff;color: #fff;padding: 5px;" ><i class="fa fa-pencil"></i> Edit</a>
                          <a style="background-color: red;padding: 5px;color: #fff;cursor:pointer;float: left;margin-top: 15px;" 
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
        if (confirm('Are You Sure To Delete Branch?')) {
        $.ajax({
            type:'post',
            url:'deleteSingleData.php',
            data: 'tableName=branches&key=id&value='+id,
            success:function(msg){
                        alert('Branch Deleted Successfully!');
                        location.reload();
                       }
                });
        }
 }
</script>  
        <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
            <script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="plugins/datatables/plugins/bootstrap/dataTables.bootstrap.min.js" type="text/javascript"></script>
            
  
<script type="text/javascript" src="bootstrap/js/common.js" charset="utf-8"></script>