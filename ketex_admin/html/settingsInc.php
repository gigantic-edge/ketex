<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="settings.php">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            SETTINGS</h3>
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
                if (isset($_SESSION['succ_settings_add'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION['succ_settings_add']; ?></strong>
                    </div>
                    <?php
                    unset($_SESSION['succ_settings_add']);
                }
                ?>
                <?php
                if (isset($_SESSION['fail_settings_add'])) {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION['fail_settings_add']; ?></strong>
                    </div>
                    <?php
                    unset($_SESSION['fail_settings_add']);
                }
                ?>
            </div>
            <div class="m-portlet m-portlet--mobile">
                <!--div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#m_modal_page">Add settings</button>


                                <!--Add Product Category-->
                                <!--div class="modal fade" id="m_modal_page" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Page</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form method="post" action="db-add-settings.php" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        <div class="form-group m-form__group">
                                                            <label for="User name">Admin Name</label>
                                                            <input type="text" class="form-control" name="page_name" required>                   
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group m-form__group">
                                                            <label for="User name">Banner Image</label>
                                                            <input type="file" class="form-control" name="image" >                   
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group m-form__group">
                                                            <label for="User name">Terms & Condition</label>
                                                            <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>                   
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group m-form__group">
                                                            <label for="User name">Email</label>
                                                            <input type="text" class="form-control" name="email" required>                   
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group m-form__group">
                                                            <label for="User name">Phone</label>
                                                            <input type="text" class="form-control" name="phone" required>                   
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group m-form__group">
                                                            <label for="User name">Meta Title</label>
                                                            <input type="text" class="form-control" name="meta_title" required>                   
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </h3>
                        </div>
                    </div>
                </div><--->

                <div class="m-portlet__body">

                    <div class="m-portlet m-portlet--mobile">


                        <div class="table-responsive" id="modelTable">
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>ADMIN NAME</th>
                                       
                                        <th>EMAIL</th>
                                        <th>WEBSITE NAME</th>
                                        
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($settingsarr)):
                                        $i = 1;
                                        foreach ($settingsarr as $k => $v):
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v['user_login'] ?></td>
                                              
                                                <td><?php echo $v['email'] ?></td>
                                                <td><?php echo $v['website_name'] ?></td>
                                                
                                                <td><a class="btn btn-info btn-sm" href="editsettings.php?id=<?php echo $v['id'] ?>">Edit</a></td>

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


