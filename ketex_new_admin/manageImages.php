<?php 
include_once('header.php'); 
if(isset($_GET['id'])){
    $sql ="SELECT * FROM `product_details` WHERE `pro_id` = '".$_GET['id']."' ";
    $query2 = $conn->query($sql);
    $productData = $query2->fetch(PDO::FETCH_LAZY);
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
                        <h3 class="box-title">Product <strong><?php echo $productData['pro_name'];?></strong> Manage Image</h3>
                    </div>
                    <?php if(isset($_SESSION['message'])){ ?>
                        <p style="background-color: <?php echo $_SESSION['msgColor'];?>;color: #fff;padding: 10px;"><?php echo $_SESSION['message'];?></p>
                    <?php unset($_SESSION['message']); unset($_SESSION['msgColor']); } ?> 
                        <div class="box-body">
                            <div class="row">
<?php 
$sql ="SELECT * FROM `product_image` WHERE `pro_id` = '".$_GET['id']."' ORDER BY `proimg_id` DESC ";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row){
    
?>                                               
                                <div class="col-md-3 ">                                
                                    <div class="form-group">
                                       <img src="../upload/profile_image/<?php echo $row['product_img'];?>" style="height: 250px;width: 250px;">
                                    </div>
                                    <input type="radio" name="mainImage" value="<?php echo $row['proimg_id'];?>" 
                                    <?php if($row['image_position'] == '1'){ echo 'checked'; } ?> style="margin-left: 20px;">
                                    <a href="deleteImage.php?id=<?php echo $row['proimg_id'];?>&pro_img=<?php echo $_GET['id'];?>" onclick="return confirm('Are You Sure To Delete Product Image?')">
                                        <i class="fa fa-close" style="float: right;font-size: 30px;color: red;margin-right: 15px;"></i></a>
                                </div>
<?php } ?>                                
                                <input type="hidden" name="pro_id" id="pro_id" value="<?php echo $_GET['id'];?>">
                            </div>    
                        </div><!-- /.box-body -->
                </div>
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
<script type="text/javascript">
$(document).ready(function () {
    $('input[type=radio][name=mainImage]').change(function() {
    var img_id = this.value;    
    var pro_id = $("#pro_id").val();
    $.ajax({
      type: "POST",
      url: "setMainImage.php",
      data: 'img_id='+img_id+'&pro_id='+pro_id,
      datatype: "html",
      success: function(result){
            //alert(result);      
          }
      });
});
});

</script>