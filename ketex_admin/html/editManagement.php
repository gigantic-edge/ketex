<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="editManagement.php">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            Pages Update</h3>
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
                <form class="m-form m-form--fit m-form--label-align-right" method="post" action="db_edit_page.php"  enctype="multipart/form-data">

                    <input type="hidden" name="profile_id" value="<?php echo $singlepage['page_id'] ?>" required> 

                    <div class="m-portlet__body col-md-6">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Items Name</label>
                                <input type="text" class="form-control" name="page_title" value="<?php echo $singlepage['page_title'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet__body col-md-6">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Page Content</label>

                                <textarea name="content" rows="500" cols="500">

                                 <?php echo $singlepage['content'] ?>
                                </textarea>


                                
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet__body col-md-6">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Page Heading</label>
                                <input type="text" class="form-control" name="page_heading" value="<?php echo $singlepage['page_heading'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet__body col-md-6">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Meta Description</label>
                                <input type="text" class="form-control" name="meta_description" value="<?php echo $singlepage['meta_description'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet__body col-md-6">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Meta Keywords</label>
                                <input type="text" class="form-control" name="meta_keywords" value="<?php echo $singlepage['meta_keywords'] ?>">
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
