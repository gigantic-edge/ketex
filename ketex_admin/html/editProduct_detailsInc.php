<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="product_details.php">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            Product Details Update</h3>
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
                                Edit Product
                            </h3>
                        </div>
                    </div>

                </div>
                <form class="m-form m-form--fit m-form--label-align-right" method="post" action="db_edit1.php"  enctype="multipart/form-data">
                    <div class="modal-body col-md-6">
                        

                    <input type="hidden" name="profile_id" value="<?php echo $singleproarr1['pro_id'] ?>" required> 
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                
                                <label class="col-form-label ">Product Name</label>
                                <input type="text" class="form-control" name="pro_name" value="<?php echo $singleproarr1['pro_name'] ?>">
                            </div>
                        </div>
                        <br>

                        

                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Product Description</label>
                                
                                <textarea name="pro_description" rows="10" cols="100">

                                 <?php echo $singleproarr1['pro_description'] ?>
                                </textarea>
                            
                            </div>
                        </div>
                        <br>
                        <!-- <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Career Highlights</label>

                                <textarea  rows="20" cols="100" name="career_highlights" class="form-control">
                                    <?php echo isset($singleproarr1['description']) ? htmlspecialchars_decode($singleproarr1['description']) : ''; ?>

                                </textarea>
                            </div>
                        </div> -->

                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Product Description</label>
                                
                                <textarea name="career_highlights" rows="10" cols="100">

                                 <?php echo $singleproarr1['pro_description'] ?>
                                </textarea>
                            
                            </div>
                        </div>
                        <br>

                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                
                                <label class="col-form-label ">Product PDF Title</label>
                                <input type="text" class="form-control" name="product_pdf_title" value="<?php echo $singleproarr1['product_pdf_title'] ?>">
                            </div>
                        </div>


                        <div class="col-md-5">
                            <div class="form-group m-form__group row">
                                
                                <label class="col-form-label ">Product PDF </label>
                                <input type="text" class="form-control" name="pdf" value="<?php echo $singleproarr1['pdf'] ?>">
                                <!-- <a class="btn btn-info btn-sm" href="edit_pdf.php?id=<?php echo $singleproarr1['pro_id'] ?>">Edit</a> -->
                                
                                <a href="edit_pdf.php?ID=<?php echo $singleproarr1['pro_id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit" ></i></a>

                                <br>
            
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
