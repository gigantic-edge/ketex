<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="notice_a.php">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            Notice Image Update</h3>
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
                    <!--<div class="m-portlet__head-caption">-->
                    <!--    <div class="m-portlet__head-title">-->
                    <!--        <h3 class="m-portlet__head-text">-->
                    <!--            Edit Category -->
                    <!--        </h3>-->
                    <!--    </div>-->
                    <!--</div>-->

                </div>
                <form class="m-form m-form--fit m-form--label-align-right" method="post" action="db_image_notice.php"  enctype="multipart/form-data">

                    <input type="hidden" name="profile_id" value="<?php echo $singlenotice['id'] ?>" required> 


                   
                    <div class="col-md-5">
                   
                            <div class="form-group m-form__group row">                                
                                <label class="col-form-label ">Image

                                </label>                                                             
                                <img src="
                                <?php if ($singlenotice['image'] != '') { ?>
                                <?php echo $database->base_url . $database->document_path_site_image . $singlenotice['image']; ?>" width="200">                                         
                                <?php } ?>
                                 
                                <br>
            
                            </div>
                    </div>
                    

                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label "> Image Upload</label>
                                <input type="file" name="image" class="form-control"/>

                            </div>
                        </div>
                       

                        
                         <br> <br>
                    </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </div>
                  
                </form>
            </div>
        </div>
    </div>
</div>
