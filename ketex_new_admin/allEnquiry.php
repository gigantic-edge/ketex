<?php 
include_once('header.php'); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 410px;">
    <!-- Content Header (Page header) -->
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            
            <div class="col-md-12">
            <a style="background-color: red;color: #fff;padding: 5px;display:none;cursor:pointer" id="deleteBtn"><i class="fa fa-trash"></i> Delete Enquiry</a>
                <div class="box" style="margin-top: 10px;">
                    <div class="box-header">
                        <h3 class="box-title">All Enquiry List </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th><a id="select_all">Select_All</a><br><a id="unselect_all">Unselect</a></th>
                                  <th>Sr. No.</th>
                                  <th>Customer Name</th>
                                  <th>Email</th>
                                  <th>Phone Number</th>
                                  <th>Country</th>
                                  <th>Subject</th>
                                  <th>Message</th>
                                  <th>Enquiry Time</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$sql ="SELECT * FROM `enquiry_main` ORDER BY `id` DESC ";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

$i = '1';
foreach($rows as $row){
    
?>                    
                    <tr>
                        <th><input type="checkbox" class="checkBoxProducts" id="Checkbox1" name="selectedProduct[]" value="<?php echo $row['id'];?>" /></th>
                      <td><?= $i; ?></td>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['phn_number'];?></td>
                      <td><?php echo $row['country'];?></td>
                      <td><?php echo $row['subject'];?></td>
                      <td><?php echo $row['message'];?></td>
                      <td><?php echo $row['created_at'];?></td>
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

<script type="text/javascript">
$(document).ready(function(){
    $('#example').DataTable({
        "ordering": false
    });

    $("#example").on("click", "#select_all", function(){
    //$('#select_all').on('click',function(){
            $('#example').find('.checkBoxProducts').each(function () {
            //$('.checkBoxProducts').each(function(){
                this.checked = true;
            });
            $("#deleteBtn").css('display','inline');
    });
    $("#example").on("click", "#unselect_all", function(){
    //$('#unselect_all').on('click',function(){
            $('.checkBoxProducts').each(function(){
                this.checked = false;
            });
            $("#deleteBtn").css('display','none');
    });
    
    $("#example").on("click", ".checkBoxProducts", function(){
    //$('.checkBoxProducts').on('click',function(){
        if(this.checked){
            $("#deleteBtn").css('display','inline');
        }
        if($('.checkBoxProducts:checked').length == 0){
            $("#deleteBtn").css('display','none');
        }
            
    });
    
    $('#deleteBtn').on('click',function(){
        if (confirm('Are You Sure To Delete Selected Enquiry?')) {
        var myCheckboxes = new Array();
        $(".checkBoxProducts:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
        
        $.ajax({
            type: "POST",
            url: "deleteMultipleData.php",
            dataType: 'html',
            data: 'tableName=enquiry_main&key=id&myCheckboxes='+myCheckboxes,
            success: function(data){
                alert('Enquiry Deleted Successfully!');
                $('.checkBoxProducts').each(function(){
                    this.checked = false;
                });
                location.reload();
            }
        });
        }
    });
    
    
});
</script>