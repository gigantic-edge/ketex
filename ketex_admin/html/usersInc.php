<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="users.php">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            Users</h3>
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
                if (isset($_SESSION['succ_user_edit'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION['succ_user_edit']; ?></strong>
                    </div>
                    <?php
                    unset($_SESSION['succ_user_edit']);
                }
                ?>
                <?php
                if (isset($_SESSION['fail_user_edit'])) {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION['fail_user_edit']; ?></strong>
                    </div>
                    <?php
                    unset($_SESSION['fail_user_edit']);
                }
                ?>
            </div>
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                All Users

                            </h3>
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
                                        <th>COMPANY</th>
                                        <th>USER</th>
                                        <th>GST</th>
                                        <th>ADDRESS</th>
                                        <th>PIN</th>
                                        <th>STATE</th>
                                        <th>PHONE</th>
                                        <th>EMAIL</th>
                                        <th>REGISTRATION DATE</th>
                                        <th>LAST LOGIN</th>
                                        <th>STATUS</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($usersarr)):
                                        $i = 1;
                                        foreach ($usersarr as $k => $v):
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v['um_company'] ?></td>
                                                <td><?php echo $v['um_name'] ?></td>
                                                <td><?php echo $v['um_gst'] ?></td>
                                                <td><?php echo $v['um_address1'] . '<br>' . $v['um_address2'] ?></td>

                                                <td><?php echo $v['um_pin'] ?></td>
                                                <td><?php echo $v['um_state'] ?></td>
                                                <td><?php
                                                    echo $v['um_phone1'];
                                                    echo $v['um_phone2'] == '' ? '' : '/' . $v['um_phone2'];
                                                    ?></td>
                                                <td><?php echo $v['um_email'] ?></td>
                                                
                                                <td><?php echo $v['um_added'] ?></td>
                                                <td><?php echo $v['um_last_login'] ?></td>
                                                
                                                <td>
                                                    <?php echo $v['um_active'] == '0' ? '<span class="alert alert-success">Active</span>' : '<span class="alert alert-danger">Inactive</span>'; 
                                                    ?></td>
                                                
                                                <td><a class="btn btn-info btn-sm" href="editUser.php?umid=<?php echo $v['um_id'] ?>">Edit</a></td>
                                                <td><a class="btn btn-info btn-sm" href="schemes.php?umid=<?php echo $v['um_id'] ?>">Orders</a></td>

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


