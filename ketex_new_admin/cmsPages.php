<?php include_once('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content"> 
        <div class="row">
            <div class="col-xs-12">
                    <?php if(isset($_SESSION['message'])){ ?>
                        <p style="background-color: <?php echo $_SESSION['msgColor'];?>;color: #fff;padding: 10px;"><?php echo $_SESSION['message'];?></p>
                    <?php unset($_SESSION['message']); unset($_SESSION['msgColor']); } ?>   
            <!--<a style="background-color: #00b3ff;color: #fff;padding: 5px;" href="addCmsPage.php"><i class="fa fa-plus"></i> Add New CMS Page</a>-->
                <div class="box" style="margin-top: 10px;">
                    <div class="box-header">
                        <h3 class="box-title">CMS Page List </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th>Sr. No.</th>
                                  <th>Page Name</th>
                                  <th>Page Heading</th>
                                  <th>Page Description</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$sql ="SELECT * FROM `pages` ORDER BY `page_id` DESC ";
$query = $conn->query($sql);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

$i = '1';
foreach($rows as $row){
    
?>                    
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?php echo $row['page_title'];?></td>
                      <td><?php echo $row['page_heading'];?></td>
                      <td><?php echo strlen($row['content']) > 100 ? substr($row['content'],0,100)."..." : $row['content']; ?></td>
                      <td>
                      <a href="addCmsPage.php?id=<?php echo $row['page_id'];?>" style="background-color: #00b3ff;padding: 5px;color: #fff;"><i class="fa fa-pencil"></i> Edit</a>
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
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<?php include_once('footer.php'); ?>
