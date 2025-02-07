<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="product_details.php">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            Product Image Update</h3>
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
                <form class="m-form m-form--fit m-form--label-align-right" method="post" action="db_edit2.php"  enctype="multipart/form-data">

                    <input type="hidden" name="profile_id" value="<?php echo $singleproarr1['pro_id'] ?>" required> 

                    <div class="m-portlet__body col-md-6">

                        <div class="col-md-12">
                            <div class="form-group m-form__group row">

                            
                                <label class="col-form-label ">Product Image</label> &nbsp;&nbsp;&nbsp;
                                <?php if ($singleproarr1['image'] != '') { ?>
                                    <img src="<?php echo $database->base_url . $database->document_path_site_image . $singleproarr1['image']; ?>" width="200px"  />&nbsp;&nbsp;&nbsp;&nbsp;

                                <?php } ?>
                                <!-- <input type="file" name="image" id="image" class="form-control"/>                            </div> -->
                        </div>

                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                
                                <!-- <label class="col-form-label ">Product Name</label> -->
                                <input type="file" name="image" id="image" class="form-control"/>                            </div>
                            </div>
                        </div>

                        
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
