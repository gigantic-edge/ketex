<?php
include_once('header.php');
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM `job_details`  WHERE `job_id` = '" . $_GET['id'] . "' ";
    $query2 = $conn->query($sql);
    $jobData = $query2->fetch(PDO::FETCH_LAZY);

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
                        <h3 class="box-title">Add Job</h3>
                    </div>
                    <?php if (isset($_SESSION['message'])) { ?>
                        <p style="background-color: <?php echo $_SESSION['msgColor']; ?>;color: #fff;padding: 10px;">
                            <?php echo $_SESSION['message']; ?>
                        </p>
                        <?php unset($_SESSION['message']);
                        unset($_SESSION['msgColor']);
                    } ?>
                    <form role="form" id="addUser" action="addjobData.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fname">Job Title *</label>
                                        <input type="text" name="job_name" class="form-control required" required
                                            placeholder="Job Title" <?php if (isset($_GET['id'])) { ?>
                                                value="<?php echo $jobData['job_name']; ?>" <?php } ?>>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fname">Sort Number *</label>
                                        <input type="text" name="sort_number" class="form-control required"
                                            placeholder="Sort Number" <?php if (isset($_GET['id'])) { ?>
                                                value="<?php echo $jobData['sort_number']; ?>" <?php } ?>>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fname">Job Details *</label>
                                        <textarea name="job_detail" id="job_detail" class="form-control"
                                            required><?php echo $jobData['job_detail']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <?php if (isset($_GET['id'])) { ?>
                                <input type="hidden" name="id" value="<?php echo $jobData['job_id']; ?>">
                                <input type="submit" class="btn btn-primary" name="submit" value="Update">
                            <?php } else { ?>
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <div>
                    <?php
                    if (isset($_GET['job_id'])) { ?>
                        <input type="hidden" name="job_name" id="job_name" value="<?= $jobData['job_id']; ?>">
                        <div class="col-md-12">
                            <?php
                            $sql        = "SELECT * FROM `job_details`  WHERE `job_id` = '" . $_GET['id'] . "' ";
                            $query2     = $conn->query($sql);
                            $var        = $query;
                            echo $var;die; 
                            ?>
                        </div>

                    <?php }

                    ?>
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
    let myVariable = document.querySelector("h1");
    window.onload = function () {

        CKEDITOR.replace('job_detail');
    };
    function upload_check() {
        var upl = document.getElementById("file_id");
        var max = document.getElementById("max_id").value;

        if (upl.files[0].size > max) {
            alert("Uploaded File Size Is Big!");
            upl.value = "";
        }
    };
    myImage.onclick = () => {
        const mySrc = myImage.getAttribute("src");
        if (mySrc === "images/firefox-icon.png") {
            myImage.setAttribute("src", "images/firefox2.png");
        } else {
            myImage.setAttribute("src", "images/firefox-icon.png");
        }
    };
    function multiply(num1, num2) {
        let result = num1 * num2;
        return result;
    }
    document.querySelector("html").addEventListener("click", function () {
        alert("Ouch! Stop poking me!");
    });
    function upload_check1() {
        var upl = document.getElementById("file_id1");
        var max = document.getElementById("max_id1").value;

        if (upl.files[0].size > max) {
            alert("Uploaded PDF File Size Is Big!");
            upl.value = "";
        }
    };
</script>
<script type="text/javascript" src="bootstrap/js/common.js" charset="utf-8"></script>