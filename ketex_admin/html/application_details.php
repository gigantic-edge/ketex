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
                        Application details</h3>
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
                                <button type="button" class="btn btn-success" onclick="window.location.href = 'add_application_details_a.php'">Add Application Details</button>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__body">

                    <div class="m-portlet m-portlet--mobile">


                        <div class="table-responsive" id="modelTable">
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                                <thead>
                                    <tr>

                                        <th>SL No</th>
                                        <th>APPLICATION CATEGORY Name</th>
                                        <th>APPLICATION Image</th>
                                        <th>APPLICATION Name </th>
                                        <th>APPLICATION Description</th>
                                        <th>CREATE DATE </th>
                                        <th>UPDATE DATE </th>
                                        <th>ACTION</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($app_details)):
                                        $i = 1;
                                        foreach ($app_details as $k => $v):
                                          //  print_r($product_details);
                                            ?>
                                            <tr text>
                                                <td  class="text-center"><?php echo $i; ?></td>
                                                
                                                
                                                <td> <b><?php echo $v['cat_name'] ?></b></td>

                                                <td> 
                                                 <?php if ($v['app_image'] != '') { ?>

                                                    <img src="
                                                        <?php echo $database->base_url . $database->document_path_site_image . $v['app_image']; ?>" width="100"/>
                                                    <?php } ?>
                                                </td>   
                                                
                                                <td> <b><?php echo $v['app_name'] ?></b></td>
                                                <td> <b><?php echo $v['app_description'] ?></b></td>
                                               
                                                <td> <b><?php echo $v['created_at'] ?></b></td>
                                                <td> <b><?php echo $v['updated_at'] ?></b></td>
                                                <td>

                                                    <a class="btn btn-info btn-sm" href="edit_application_details_a.php?id=<?php echo $v['app_id'] ?>"><i class="fa fa-edit" style="font-size:15px">&nbsp;&nbsp;Edit</i></a><br>
                                                    
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

