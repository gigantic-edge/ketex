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
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add New Notice</h3>
                    </div>
                    <?php if(isset($_SESSION['message'])){ ?> 
                        <p style="background-color: <?php echo $_SESSION['msgColor'];?>;color: #fff;padding: 10px;"><?php echo $_SESSION['message'];?></p>
                    <?php unset($_SESSION['message']); unset($_SESSION['msgColor']); } ?>   
                    <form role="form" id="addUser" action="addNoticeData.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Notice Title *</label>
                                        <input type="text" name="title" class="form-control required" required placeholder="Notice Title"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['title'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Notice Date *</label>
                                        <input type="date" name="date" class="form-control required" required placeholder="Notice Date"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['date'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <?php if(isset($_GET['id'])){?> 
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <img src="../upload/profile_image/<?php echo $employeeData['image'];?>" style="height: 80px;width: 80px;">
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Notice Image *</label>
                                        <input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="400000" />
                                        <input type="file" name="notice_image" class="form-control required"
                                        <?php if(isset($_GET['id'])){?> <?php } else { ?> <?php } ?> onchange="upload_check()" id="file_id">
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname">Notice PDF *</label>
                                        <input id="max_id1" type="hidden" name="MAX_FILE_SIZE1" value="10000000" />
                                        <input type="file" name="notice_pdf" class="form-control required"
                                        <?php if(isset($_GET['id'])){?> <?php } else { ?>  <?php } ?> onchange="upload_check1()" id="file_id1">
                                    </div>
                                </div>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Content *</label>
                                        <textarea name="content" id="content" class="form-control required" required><?php if(isset($_GET['id'])){ echo $employeeData['content'];?>" <?php } ?></textarea>
                                        <p id="remain">200</p>
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
            
  
<script type="text/javascript" src="dist/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript">
    //window.onload = function () {
       
    //    CKEDITOR.replace('content');
    //};
$(document).ready(function () {  
  $('#content').keypress(function(e) {
    var tval = $('textarea').val(),
        tlength = tval.length,
        set = 200,
        remain = parseInt(set - tlength);
    $('#remain').text(remain);
    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        $('#content').val((tval).substring(0, tlength - 1));
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