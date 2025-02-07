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
                    <a href="profile.php">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            PROFILE</h3>
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
            <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
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
            </div>
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                               <!-- <button type="button" class="btn btn-success" onclick="window.location.href = 'addCareer.php'">Add Profile</button> -->

                        </div>
                    </div>
                </div>

                <div class="m-portlet__body">

                    <div class="m-portlet m-portlet--mobile">


                        <div class="table-responsive" id="modelTable">
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>IMAGE</th>
                                     
                                        <th>NAME</th>
                                        <th>Career Transformation Journey</th>
                                        


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($profilearr)):
                                        $i = 1;
                                        foreach ($profilearr as $k => $v):
                                         //   print_r($v);
                                            ?>
                                            <tr text>
                                                <td  class="text-center"><?php echo $i; ?></td>
                                                <td>
                                                    <?php if ($v['emp_img'] != '') { ?>
                                                        <img src="<?php echo $database->base_url . $database->document_path_site_image . $v['emp_img']; ?>" width="100"/>
                                                    <?php } ?></td>
                                               
                                                <td> <b><?php echo $v['name'] ?></b></td>
                                           

                                              <!-- <td> <b><?php echo $v['body'] ?></b></td> -->
                                                <td> <b><?php echo substr( $v['body'],0,100 )?></b></td>  
                                                <td>
                                                  <!--  <p data="<?php// echo $v['id']; ?>" class="status_checks btn-sm <?php //echo ($v['status']) ? 'btn-success' : 'btn-danger' ?>"><?php //echo ($v['status']) ? 'Active' : 'Inactive' ?></p> -->

                                                    <a class="btn btn-info btn-sm" href="editCareer.php?id=<?php echo $v['id'] ?>">Edit</a></td>
                                              
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

