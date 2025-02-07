<?php 
include_once('header.php'); 
if(isset($_GET['id'])){
    $sql ="SELECT * FROM `product_category` WHERE `cat_id` = '".$_GET['id']."' ";
    $query2 = $conn->query($sql);
    $businessData = $query2->fetch(PDO::FETCH_LAZY);
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
                        <h3 class="box-title">Add Category</h3>
                    </div>
                    <?php if(isset($_SESSION['message'])){ ?>
                        <p style="background-color: <?php echo $_SESSION['msgColor'];?>;color: #fff;padding: 10px;"><?php echo $_SESSION['message'];?></p>
                    <?php unset($_SESSION['message']); unset($_SESSION['msgColor']); } ?>   
                    <form role="form" id="addUser" action="productCategoryData.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12 ">                                
                                    <div class="form-group">
                                        <label for="fname">Category Name *</label>
                                        <input type="text" name="title" class="form-control required" required placeholder="Category Name"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $businessData['cat_name'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <div class="col-md-12 ">                                
                                    <div class="form-group">
                                        <label for="fname">Sort Number *</label>
                                        <input type="text" name="sort_number" class="form-control required" required placeholder="Sort Number"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $businessData['sort_number'];?>" <?php } ?>>
                                    </div>
                                </div>
                            </div>    
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <?php if(isset($_GET['id'])){ ?>
                            <input type="hidden" name="id" value="<?php echo $businessData['cat_id'];?>">
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
                        <h3 class="box-title">Category List </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Category</th>
                                  <th>Sort Number</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
<?php 
$sql ="SELECT * FROM `product_category` ORDER BY `sort_number` ASC ";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

$i = '1';
foreach($rows as $row){
?>                    
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?php echo $row['cat_name'];?></td>
                      <td><?php echo $row['sort_number'];?></td>
                      <td>
                          <a href="?id=<?php echo $row['cat_id'];?>" style="background-color: #00b3ff;padding: 5px;color: #fff;"><i class="fa fa-pencil"></i> Edit</a>
                          <a style="background-color: red;padding: 5px;color: #fff;cursor:pointer;" onclick="javascript:RemoveData(<?php echo $row['cat_id'];?>);"><i class="fa fa-trash"></i> Delete</a>
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
        if (confirm('Are You Sure To Delete Category?')) {
        $.ajax({
            type:'post',
            url:'deleteSingleData.php',
            data: 'tableName=product_category&key=cat_id&value='+id,
            success:function(msg){
                        alert('Category Deleted Successfully!');
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