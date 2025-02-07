<style>
    .view_count{
        background: #e0e0e0;
        padding: 5px;
        position: relative;
        top: 16px;
        font-size: 10px;
    }
</style>

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            Product details</h3>
                    </a>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="dashboard.php" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="dashboard.php" class="m-nav__link">
                                <span class="m-nav__link-text">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="m-content">
            <!-- <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
                <?php
                if (isset($_SESSION['succ_profile_add'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION['succ_profile_add']; ?></strong>
                    </div>
                    <?php
                    unset($_SESSION['succ_profile_add']);
                }
                ?>
                <?php
                if (isset($_SESSION['fail_profile_add'])) {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION['fail_profile_add']; ?></strong>
                    </div>
                    <?php
                    unset($_SESSION['fail_profile_add']);
                }
                ?>
            </div> -->
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <button type="button" class="btn btn-success" onclick="window.location.href = 'addProduct_details.php'">Add Product</button>
                        </div>
                    </div>
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <button type="button" class="btn btn-danger" id="deleteBtn">Delete Selected Product</button>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__body">

                    <div class="m-portlet m-portlet--mobile">


                        <div class="table-responsive" id="modelTable">
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>SL No</th>
                                        <th>CATEGORY</th>
                                        <th>NAME</th>
                                       <th>PRODUCT DESCRIPTION </th>
                                       <th>PDF TITLE </th>
                                       <th>PDF </th>
                                       <th>CREATE DATE </th>
                                       <th>UPDATE DATE </th>
                                        <th>ACTION</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($product_details)):
                                        $i = 1;
                                        foreach ($product_details as $k => $v):
                                          //  print_r($product_details);
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" value="<?php echo $v['pro_id'] ?>" name="productsId[]" /></td>
                                                <td  class="text-center"><?php echo $i; ?></td>
                                                
                                                
                                                <td> <b><?php echo $v['cat_name'] ?></b></td>
                                                
                                                <td> <b><?php echo $v['pro_name'] ?></b></td>
                                                <td> <b><?php echo $v['pro_description'] ?></b></td>
                                                <td> <b><?php echo $v['product_pdf_title'] ?></b></td>

                                                <!-- <td> <b><a href="<?php echo $database->base_url . $database->document_path_site_image .$v['pdf'] ?>" target="_blank" class="aprl" id="aprl-3" <?php echo  $v['pdf'] ?>>Click Here</a></b></td> -->
                                                 <td> 
                                                 <?php if ($v['pdf'] == '') { ?>

                                                    <?php } else { ?>

                                                        <b><a href="<?php echo $database->base_url . $database->document_path_site_image .$v['pdf'] ?>" target="_blank" class="aprl" id="aprl-3" <?php echo  $v['pdf'] ?>>View PDF</a></b>

                                                    <?php } ?>
                                                </td>              
                                                

                                                <td> <b><?php echo $v['created_at'] ?></b></td>
                                                <td> <b><?php echo $v['update_at'] ?></b></td>
                                                <td>
                                                    <!-- <p data="<?php echo $v['pro_id']; ?>" class="status_checks btn-sm <?php echo ($v['status']) ? 'btn-success' : 'btn-danger' ?>"><?php echo ($v['status']) ? 'Active' : 'Inactive' ?></p> -->

                                                    <a class="btn btn-info btn-sm" href="editProduct_details.php?id=<?php echo $v['pro_id'] ?>"><i class="fa fa-edit" style="font-size:15px">&nbsp;&nbsp;Edit</i></a><br>
                                                    

                                                    <a class="btn btn-danger btn-sm" href="addProduct_image.php?id=<?php echo $v['pro_id'] ?>&pro_name=<?php echo $v['pro_name'] ?>"><i class="fa fa-upload" style="font-size:15px">&nbsp;&nbsp;Image Upload</i></a><br><br>

                                                    <a class="btn btn-info btn-sm" href="manage_image.php?id=<?php echo $v['pro_id'] ?>"><i class="fa fa-cogs" style="font-size:15px">&nbsp;&nbsp;Manage Image</i></a><br>

                                                </td>
                                              
                                            </tr>
                                            <?php
                                            $i++;
                                        endforeach;

                                    endif;
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div> 

                    <div class="m-portlet__foot m-portlet__foot--fit">

                        <div class="m-form__actions">


                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $("#deleteBtn").on('click', function () {
            if (!confirm("Are You Sure To Delete Selected Products")){
              return false;
            }
            arr=[];
            var arr = $("input[name='productsId[]']:checked").map(function() { 
                    return this.value; 
                  }).get();
            $.ajax({
           type: "POST",
           data: {arr:arr},
           url: "deleteMultiProducts.php",
           success: function(msg){
             //alert("success");
             location.reload();
           }
            });
        });

    });
</script>
<script type="text/javascript">
    $(document).on('click', '.status_checks', function () {
        var status = ($(this).hasClass("btn-success")) ? '0' : '1';
        var msg = (status == '1') ? 'Activate' : 'Inactivate';
        if (confirm("Are you sure to " + msg)) {
            var current_element = $(this);
            var url = "ajax.php";
            $.ajax({
                type: "POST",
                url: url,
                data: {id: $(current_element).attr('data'), status: status},
                success: function (data)
                {
                    location.reload();
                }
            });
        }
    });
</script>

