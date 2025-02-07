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
                        Enquiry details</h3>
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
<!--                                <button type="button" class="btn btn-success" onclick="window.location.href = 'add_employee_details.php'">Add Employee Details</button>-->
                        </div>
                    </div>
                </div>

                <div class="m-portlet__body">

                    <div class="m-portlet m-portlet--mobile">
                        <form method="post" action="delete_enquiry.php">


                        <div class="table-responsive" id="modelTable">
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                                <thead>
                                    <tr>
                                    <th><a href="javascript:selectToggle(selete);" id="show"
                                                    onclick="checkALL();">Select All</a> | <a
                                                    href="javascript:selectToggle(unselect);" id="hide"
                                                    onclick="unCheckALL();">None</a>
                                            </th>

                                        <th>SL No</th>
                                        <th>PRODUCT Name</th>
                                        <th>CUSTOMER Name </th>
                                        <th>EMAIL</th>
                                        <th>PHONE NUMBER</th>
                                        <th>MESSAGE</th>
                                        <th>CREATE DATE </th>
                                        <th>ACTION</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($enquiry)):
                                        $i = 1;
                                        foreach ($enquiry as $k => $v):
                                          //  print_r($product_details);
                                            ?>
                                            <tr text>
                                            <td>
                                                <input type='checkbox' name='draw[]' value="<?php echo $v["id"]; ?>"
                                                    id="required-checkbox1" onClick="CheckIfChecked()">
                                                </td>
                                                <td  class="text-center"><?php echo $i; ?></td>
                                                
                                                
                                                <td> <b><?php echo $v['pro_name'] ?></b></td>
                                                <td> <b><?php echo $v['cst_name'] ?></b></td>
                                                <td> <b><?php echo $v['email'] ?></b></td>
                                               <td> <b><?php echo $v['phn_number'] ?></b></td>
                                               <td> <b><?php echo $v['message'] ?></b></td>
                                                <td> <b><?php echo $v['created_at'] ?></b></td>
                                                
                                                <td>

                                                    <a class="btn btn-info btn-sm" href="#?id=<?php echo $v['id'] ?>"><i class="fa fa-edit" style="font-size:15px">&nbsp;&nbsp;Edit</i></a><br>
                                                    
                                                </td>
                                              
                                            </tr>
                                            <?php
                                            $i++;
                                        endforeach;

                                    endif;
                                    ?>
                                </tbody>
                                <div id="first_button" style="display:none;  margin-bottom:-6px;">
                                        <p align="left"><button type="submit" class="btn btn-success"
                                                name="delete">DELETE</button></p>
                                    </div>

                            </table>
                        </div>
                        </form>
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

<script>

function checkALL() {
    var chk_arr = document.getElementsByName("draw[]");
    for (k = 0; k < chk_arr.length; k++) {
        chk_arr[k].checked = true;
    }
    CheckIfChecked();
}

function unCheckALL() {
    var chk_arr = document.getElementsByName("draw[]");
    for (k = 0; k < chk_arr.length; k++) {
        chk_arr[k].checked = false;
    }
    CheckIfChecked();
}


function checkAny() {
    var chk_arr = document.getElementsByName("draw[]");
    for (k = 0; k < chk_arr.length; k++) {
        if (chk_arr[k].checked == true) {
            return true;
        }
    }
    return false;
}

function isCheckAll() {
    var chk_arr = document.getElementsByName("draw[]");
    for (k = 0; k < chk_arr.length; k++) {
        if (chk_arr[k].checked == false) {
            return false;
        }
    }
    return true;
}

function showFirstButton() {
    document.getElementById('first_button').style.display = "block";
}

function hideFirstButton() {
    document.getElementById('first_button').style.display = "none";
}

function CheckIfChecked() {
    checkAny() ? showFirstButton() : hideFirstButton();
    isCheckAll() ? showSecondButton() : hideSecondButton();
}
</script>


