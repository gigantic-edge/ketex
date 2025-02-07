<?php 
include_once('header.php'); 
if(isset($_GET['id'])){
    $sql ="SELECT * FROM `employee_department_details` WHERE `emp_id` = '".$_GET['id']."' ";
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
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add Employee</h3>
                    </div>
                    <?php if(isset($_SESSION['message'])){ ?> 
                        <p style="background-color: <?php echo $_SESSION['msgColor'];?>;color: #fff;padding: 10px;"><?php echo $_SESSION['message'];?></p>
                    <?php unset($_SESSION['message']); unset($_SESSION['msgColor']); } ?>   
                    <form role="form" id="addUser" action="addEmployeeData.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Department Designation *</label>
                                        <select name="dep_id" class="form-control required" required>
                                            <option value="">Select Department</option>
                                            <?php 
                                            $sql ="SELECT * FROM `employee_department` WHERE `department_name` != '' ORDER BY `department_name` ASC ";
                                            $query = $conn->query($sql);
                                            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($rows as $row){
                                            ?>      
                                            <option value="<?php echo $row['dep_id'];?>" <?php if(isset($_GET['id'])){ 
                                            if($row['dep_id'] == $employeeData['dep_id']){?> selected <?php } } ?> ><?php echo $row['department_name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Employee Name *</label>
                                        <input type="text" name="employee_name" class="form-control required" required placeholder="Employee Name"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['employee_name'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Employee Designation *</label>
                                        <input type="text" name="emp_designation" class="form-control required" required placeholder="Employee Designation"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['emp_designation'];?>" <?php } ?>>
                                    </div>
                                </div>
                                <?php if(isset($_GET['id'])){?> 
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <img src="../upload/profile_image/<?php echo $employeeData['employee_image'];?>" style="height: 80px;width: 80px;">
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Employee Image *</label>
                                        <input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="400000" />
                                        <input type="file" name="employee_image" class="form-control required"
                                        <?php if(isset($_GET['id'])){?> <?php } else { ?> required <?php } ?> onchange="upload_check()" id="file_id">
                                    </div>
                                </div>
                                <div class="col-md-12 ">                                
                                    <div class="form-group">
                                        <label for="fname">Sort Number *</label>
                                        <input type="number" name="sort_number" class="form-control required" required placeholder="Sort Number"
                                        <?php if(isset($_GET['id'])){?> value="<?php echo $employeeData['sort_number'];?>" <?php } ?>>
                                    </div>
                                </div>
                                
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <?php if(isset($_GET['id'])){ ?>
                            <input type="hidden" name="id" value="<?php echo $employeeData['emp_id'];?>">
                            <input type="submit" class="btn btn-primary" name="submit" value="Update">
                            <?php } else { ?>
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                            <?php } ?>
                        </div>    
                    </form>
                </div>
            </div>
            
            <div class="col-md-9">
            <a style="background-color: red;color: #fff;padding: 5px;display:none;cursor:pointer" id="deleteBtn"><i class="fa fa-trash"></i> Delete Employee</a>
                <div class="box" style="margin-top: 10px;">
                    <div class="box-header">
                        <h3 class="box-title">Employee List </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th><a id="select_all">Select_All</a><br><a id="unselect_all">Unselect</a></th>
                                  <th>Sr. No.</th>
                                  <th>Department</th>
                                  <th>Name</th>
                                  <th>Designation</th>
                                  <th>Image</th>
                                  <th>Sort Number</th>
                                  <th>Created Date</th>
                                  <th>Updated Date</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                //$sql ="SELECT * FROM `employee_department_details` ORDER BY CAST(`sort_number` AS UNSIGNED INTEGER) ASC ";
                                $sql ="SELECT ED.department_name,ED.sort_number AS dep_sort,EDD.* FROM `employee_department_details` AS EDD INNER JOIN employee_department ED on ED.dep_id = EDD.dep_id ORDER BY ED.sort_number ASC, EDD.sort_number ASC";
                                //echo $sql;die;
                                $query = $conn->query($sql);
                                $rows = $query->fetchAll(PDO::FETCH_ASSOC);

                                $i = '1';
                                foreach($rows as $row){                                    
                                    $sql ="SELECT * FROM `employee_department` WHERE `dep_id` = '".$row['dep_id']."' ";
                                    $query2 = $conn->query($sql);
                                    $departmentData = $query2->fetch(PDO::FETCH_LAZY);
                                ?>
                                <tr>
                                  <th><input type="checkbox" class="checkBoxProducts" id="Checkbox1" name="selectedProduct[]" value="<?php echo $row['emp_id'];?>" /></th>
                                  <td><?= $i; ?></td>
                                  <td><?php echo $row['department_name'];?></td>
                                  <td><?php echo $row['employee_name'];?></td>
                                  <td><?php echo $row['emp_designation'];?></td>
                                  <td><img src="../upload/profile_image/<?php echo $row['employee_image'];?>" style="height: 80px;width: 80px;"></td>
                                  <td><?php echo $row['sort_number'];?></td>
                                  <td><?php echo $row['create_add'];?></td>
                                  <td><?php echo $row['update_add'];?></td>
                                  <td><a href="?id=<?php echo $row['emp_id'];?>" style="background-color: #00b3ff;color: #fff;padding: 5px;" >Edit</a><br><br>
                                  <a onClick="return confirm('Are you sure you want to delete?')" href="deleteEmp.php?id=<?php echo $row['emp_id'];?>" style="background-color: red;color: white;padding: 5px;" >Delete</a></td>
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
  
<script type="text/javascript">
    $(document).ready(function(){
        $('#select_all').on('click',function(){
                $('.checkBoxProducts').each(function(){
                    this.checked = true;
                });
                $("#deleteBtn").css('display','inline');
        });
        
        $('#unselect_all').on('click',function(){
                $('.checkBoxProducts').each(function(){
                    this.checked = false;
                });
                $("#deleteBtn").css('display','none');
        });
        
        $('.checkBoxProducts').on('click',function(){
            if(this.checked){
                $("#deleteBtn").css('display','inline');
            }
            if($('.checkBoxProducts:checked').length == 0){
                $("#deleteBtn").css('display','none');
            }
                
        });
        
        $('#deleteBtn').on('click',function(){
            if (confirm('Are You Sure To Delete Selected Employee?')) {
            var myCheckboxes = new Array();
            $(".checkBoxProducts:checked").each(function() {
               myCheckboxes.push($(this).val());
            });
            
            $.ajax({
                type: "POST",
                url: "deleteMultipleData.php",
                dataType: 'html',
                data: 'tableName=employee_department_details&key=emp_id&myCheckboxes='+myCheckboxes,
                success: function(data){
                    alert('Employee Deleted Successfully!');
                    $('.checkBoxProducts').each(function(){
                        this.checked = false;
                    });
                    location.reload();
                }
            });
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
<link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="plugins/datatables/plugins/bootstrap/dataTables.bootstrap.min.js" type="text/javascript"></script>           
<script type="text/javascript">
    $('#example1').dataTable({
        aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        iDisplayLength: -1
    });
</script>
<script type="text/javascript" src="bootstrap/js/common.js" charset="utf-8"></script>