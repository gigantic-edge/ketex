<?php 
include_once('header.php'); 
if(isset($_GET['id'])){
    $sql ="SELECT * FROM `application_details` WHERE `app_id` = '".$_GET['id']."' ";
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
                        <h3 class="box-title">Add Application</h3>
                    </div>
                    <?php if(isset($_SESSION['message'])){ ?>
                        <p style="background-color: <?php echo $_SESSION['msgColor'];?>;color: #fff;padding: 10px;"><?php echo $_SESSION['message'];?></p>
                    <?php unset($_SESSION['message']); unset($_SESSION['msgColor']); } ?>   
                    <form role="form" id="addUser" action="addApplicationData.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Application Category *</label>
                                        <select name="cat_id" class="form-control required" required>
                                            <option value="">Select Application Category</option>
                                            <?php 
                                            $sql ="SELECT * FROM `application_category` WHERE `cat_name` != '' ORDER BY `cat_name` ASC ";
                                            $query = $conn->query($sql);
                                            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($rows as $row){
                                            ?>      
                                            <option value="<?php echo $row['cat_id'];?>" <?php if(isset($_GET['id'])){ 
                                            if($row['cat_id'] == $employeeData['cat_id']){?> selected <?php } } ?> ><?php echo $row['cat_name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Application Name *</label>
                                        <input type="text" name="app_name" class="form-control required" required placeholder="Application Name"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['app_name'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Application Description *</label>
                                        <textarea name="app_description" id="app_description" class="form-control" 
                                        required><?php if(isset($_GET['id'])){ echo $employeeData['app_description']; } ?></textarea>
                                        
                                        <p id="remain">150</p>
                                    </div>
                                </div>
                                <?php if(isset($_GET['id'])){?> 
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <img src="../upload/profile_image/<?php echo $employeeData['app_image'];?>" style="height: 80px;width: 80px;">
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Application Image *</label>
                                        <input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="400000" />
                                        <input type="file" name="app_image" class="form-control required"
                                        <?php if(isset($_GET['id'])){?> <?php } else { ?> required <?php } ?> onchange="upload_check()" id="file_id">
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <?php if(isset($_GET['id'])){ ?>
                            <input type="hidden" name="id" value="<?php echo $employeeData['app_id'];?>">
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
            <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
            <script>tinymce.init({ selector:'textarea' });</script>
  <script language="javascript" type="text/javascript">
$(document).ready(function () {  
  $('#app_description').keypress(function(e) {
    var tval = $('textarea').val(),
        tlength = tval.length,
        set = 150,
        remain = parseInt(set - tlength);
    $('#remain').text(remain);
    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        $('#app_description').val((tval).substring(0, tlength - 1));
        return false;
    }
});
});
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
<script type="text/javascript" src="bootstrap/js/common.js" charset="utf-8"></script>