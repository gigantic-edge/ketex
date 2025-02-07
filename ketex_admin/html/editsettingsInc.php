<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="editsettings.php">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            Edit Settings</h3>
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
                                Edit Settings <?php echo $settingsarr['admin_name'] ?>
                            </h3>
                        </div>
                    </div>

                </div>
                <form class="m-form m-form--fit m-form--label-align-right" method="post" action="db-edit-settings.php" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="old_admin_name" value="<?php echo $settingsarr['admin_name'] ?>" required>
                    <input type="hidden" name="id" value="<?php echo $settingsarr['id'] ?>" required> 
                    <div class="m-portlet__body col-md-6">
                        <div class="form-group m-form__group">
                            <label for=" ">Admin Name</label>
                            <input type="text" class="form-control" name="user_login" value="<?php echo $settingsarr['user_login'] ?>" required>                         
                        </div>
                        <div class="form-group m-form__group">
                            <label for="">email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $settingsarr['email'] ?>" >                   
                        </div>
                        <div class="form-group m-form__group">
                            <label for=" ">website</label>
                            <input type="text" class="form-control" name="website_name" value="<?php echo $settingsarr['website_name'] ?>" >                   
                        </div>
                        <div class="form-group m-form__group">
                            <label for="">keyword</label>
                            <input type="text" class="form-control" name="keyword" value="<?php echo $settingsarr['keyword'] ?>" >                   
                        </div>
                        <div class="form-group m-form__group">
                            <label class=" ">Description</label>
                            <input type="text" class="form-control" name="description" value="<?php echo $settingsarr['description'] ?>" >                   

                        </div>

                        <div class="form-group m-form__group">
                            <label for=" ">meta_title</label>
                            <input type="text" class="form-control" name="meta_title" value="<?php echo $settingsarr['meta_title'] ?>" >                   
                        </div>


                        <!--                        <div class="form-group m-form__group">
                                                    <label for="User name">Image</label>
                                                    <input type="file" name="logo" class="form-control">  
                        <?php
                        if ($settingsarr['logo'] != '') {
                            ?>
                                                                                <span>
                                                                                    <img src="<?php echo $base_url . $document_path_signature . $settingsarr['logo'] ?>" style="height: 150px; width: 150px">
                                                                                </span>
                            <?php
                        }
                        ?>
                                                </div>-->

                    </div>

                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>


                </form>
                <form class="m-form m-form--fit m-form--label-align-right" name="chngpwd" action="db_password.php" method="post" onSubmit="return valid();" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $settingsarr['id'] ?>" required> 
                    <div class="m-portlet__body col-md-6">

                        <div class="form-group m-form__group">
                            <label for="User name">Old Password</label>
                            <input type="password" class="form-control" name="opwd" id="opwd">       
                        </div>
                        <div class="form-group m-form__group">
                            <label for="User name">New Password</label>
                            <input type="password" class="form-control" name="npwd" id="npwd">                        </div>
                        <div class="form-group m-form__group">
                            <label  for="User name">Confirm Password</label>
                            <input type="password" class="form-control" name="cpwd" id="cpwd">
                        </div>

                    </div>


                    <div class="m-form__actions">
                        <button type="submit" name="Submit"class="btn btn-primary">Submit</button>

                    </div>

                </form>
            </div>

        </div>


    </div>
</div>

