<?php 
include_once('header.php'); 
if(isset($_GET['id'])){
    $sql ="SELECT * FROM `journey` WHERE `id` = '".$_GET['id']."' ";
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
                        <h3 class="box-title">Add New Journey</h3>
                    </div>
                    <?php if(isset($_SESSION['message'])){ ?> 
                        <p style="background-color: <?php echo $_SESSION['msgColor'];?>;color: #fff;padding: 10px;"><?php echo $_SESSION['message'];?></p>
                    <?php unset($_SESSION['message']); unset($_SESSION['msgColor']); } ?>   
                    <form role="form" id="addUser" action="journeyData.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                
                                <div class="col-md-2">                                
                                    <div class="form-group">
                                        <label for="fname">Year *</label>
                                        <input type="text" name="year" class="form-control required" required placeholder="Year"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['year'];?>" <?php } ?>>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Title *</label>
                                        <input type="text" name="title" class="form-control required" required placeholder="Title"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['title'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <div class="col-md-7">                                
                                    <div class="form-group">
                                        <label for="fname">Description *</label>
                                        <textarea name="description" class="form-control required" required 
                                        placeholder="Description"><?php if(isset($_GET['id'])){?><?php echo $employeeData['description'];?><?php } ?></textarea>
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
                        <h3 class="box-title">Journey List </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th>Sr. No.</th>
                                  <th>Year</th>
                                  <th>Title</th>
                                  <th>Desciption</th>
                                  <th>Updated Date</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$sql ="SELECT * FROM `journey` ORDER BY `id` ASC ";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

$i = '1';
foreach($rows as $row){
    
?>                    
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?php echo $row['year'];?></td>
                      <td><?php echo $row['title'];?></td>
                      <td><?php echo strlen(strip_tags($row['description'])) > 50 ? substr(strip_tags($row['description']),0,50)."..." : strip_tags($row['description']); ?></td>
                      <td><?php echo date('d-m-Y',strtotime($row['createdAt']));?></td>
                      <td><a href="?id=<?php echo $row['id'];?>" style="background-color: #00b3ff;color: #fff;padding: 5px;" ><i class="fa fa-pencil"></i> Edit</a>
                          <a style="background-color: red;padding: 5px;color: #fff;cursor:pointer;" 
                          onclick="javascript:RemoveData(<?php echo $row['id'];?>);"><i class="fa fa-trash"></i>Delete</a>
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
        if (confirm('Are You Sure To Delete Journey?')) {
        $.ajax({
            type:'post',
            url:'deleteSingleData.php',
            data: 'tableName=journey&key=id&value='+id,
            success:function(msg){
                        alert('Journey Deleted Successfully!');
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