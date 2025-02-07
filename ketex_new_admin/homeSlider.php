<?php 
include_once('header.php'); 
$sql ="SELECT * FROM `member` WHERE `id` = '".$loginMemberID."' ";
$query2 = $conn->query($sql);
$userData = $query2->fetch(PDO::FETCH_LAZY);
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
                        <h3 class="box-title">Add Home Slider</h3>
                    </div>
                    <?php if(isset($_SESSION['message'])){ ?>
                        <p style="background-color: <?php echo $_SESSION['msgColor'];?>;color: #fff;padding: 10px;"><?php echo $_SESSION['message'];?></p>
                    <?php unset($_SESSION['message']); unset($_SESSION['msgColor']); } ?>   
                    <form role="form" id="addUser" action="homeSliderData.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="forOTP" value="editProfile">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12 ">                                
                                    <div class="form-group">
                                        <label for="fname">Slider Image *</label>
                                        <input type="file" name="slider" class="form-control required" required>
                                    </div>
                                </div>
                                <div class="col-md-12">                                
                                    <div class="">
                                        <label for="fname">All Time </label>
                                        <input type="checkbox" name="allTime">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Festival Date *</label>
                                        <input type="date" class="form-control required" name="festivalDate" required>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        </div>    
                    </form>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Home Slider </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Slider</th>
                                  <th>All Time</th>
                                  <th>Festival Date</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$sql ="SELECT * FROM `homeSlider` ORDER BY `festivalDate` DESC ";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

$i = '1';
foreach($rows as $row){
    
?>                    
                    <tr>
                      <td><?= $i; ?></td>
                      <td><img src="homeSlider/<?php echo $row['sliderImage'];?>" style="height:150px;"></td>
                      <td><?php echo $row['allTime'];?></td>
                      <td><?php echo $row['festivalDate'];?></td>
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
        <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
            <script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="plugins/datatables/plugins/bootstrap/dataTables.bootstrap.min.js" type="text/javascript"></script>
            
  
<script type="text/javascript" src="bootstrap/js/common.js" charset="utf-8"></script>