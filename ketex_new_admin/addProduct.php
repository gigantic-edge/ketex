<?php 
include_once('header.php'); 
if(isset($_GET['id'])){
    $sql ="SELECT * FROM `product_details` WHERE `pro_id` = '".$_GET['id']."' ";
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
                        <h3 class="box-title">Add Product</h3>
                    </div>
                    <?php if(isset($_SESSION['message'])){ ?>
                        <p style="background-color: <?php echo $_SESSION['msgColor'];?>;color: #fff;padding: 10px;"><?php echo $_SESSION['message'];?></p>
                    <?php unset($_SESSION['message']); unset($_SESSION['msgColor']); } ?>   
                    <form role="form" id="addUser" action="addProductData.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Category *</label>
                                        <select name="cat_id" class="form-control required" required>
                                            <option value="">Select Category</option>
                                            <?php 
                                            $sql ="SELECT * FROM `product_category` WHERE `cat_name` != '' ORDER BY `cat_name` ASC ";
                                            $query = $conn->query($sql);
                                            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($rows as $row){
                                            ?>      
                                            <option value="<?php echo $row['cat_id'];?>" <?php if(isset($_GET['id'])){ 
                                            if($row['cat_id'] == $employeeData['cat_id']){?> selected <?php } } ?>><?php echo $row['cat_name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Product Name *</label>
                                        <input type="text" name="pro_name" class="form-control required" required placeholder="Product Name"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['pro_name'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Product PDF Title </label>
                                        <input type="text" name="product_pdf_title" class="form-control required" placeholder="Product PDF Title"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['product_pdf_title'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Product PDF </label>
                                        <input id="max_id1" type="hidden" name="MAX_FILE_SIZE1" value="10000000" />
                                        <input type="file" name="pdf" class="form-control required"
                                        <?php if(isset($_GET['id'])){?> <?php } else { ?> <?php } ?> onchange="upload_check1()" id="file_id1">
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Product Main Image *</label>
                                        <input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="400000" />
                                        <input type="file" name="main_image" class="form-control required"
                                        <?php if(isset($_GET['id'])){?> <?php } else { ?>  <?php } ?> onchange="upload_check()" id="file_id">
                                    </div>
                                </div>
                               
                                 <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Product Extra Images *</label>
                                        <input type="file" name="extra_image[]" class="form-control required" multiple
                                        <?php if(isset($_GET['id'])){?> <?php } else { ?>  <?php } ?>>
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Sort Number </label>
                                        <input type="text" name="sort_number" class="form-control required" placeholder="sort_number"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['sort_number'];?>" <?php } ?>>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Product Description *</label>
                                        <textarea name="pro_description" id="career_highlights" 
                                        class="form-control" required><?php echo $employeeData['pro_description'];?></textarea>
                                    </div>
                                </div>
                                
                                <!--<div class="col-md-12">                                -->
                                <!--    <div class="form-group">-->
                                <!--        <label for="fname">Sort Number *</label>-->
                                <!--        <textarea name="sort_number" id="sort_number" -->
                                <!--        class="form-control" required><?php echo $employeeData['sort_number'];?></textarea>-->
                                <!--    </div>-->
                                <!--</div>-->
                                
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <?php if(isset($_GET['id'])){ ?>
                            <input type="hidden" name="id" value="<?php echo $employeeData['pro_id'];?>">
                            <input type="submit" class="btn btn-primary" name="submit" value="Update">
                            <?php } else { ?>
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                            <?php } ?>
                        </div>    
                    </form>
                </div>
            </div>
            
        
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
            
            
<script type="text/javascript" src="dist/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript">
    window.onload = function () {
       
        CKEDITOR.replace('career_highlights');
    };
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
function upload_check1()
{
    var upl = document.getElementById("file_id1");
    var max = document.getElementById("max_id1").value;

    if(upl.files[0].size > max)
    {
       alert("Uploaded PDF File Size Is Big!");
       upl.value = "";
    }
};
</script>
<script type="text/javascript" src="bootstrap/js/common.js" charset="utf-8"></script>