<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="product_details.php">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                             Add Product</h3>
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
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Add Product
                            </h3>
                        </div>
                    </div>

                </div>
                <form method="post" action="db_add_product.php" enctype="multipart/form-data">
                    <div class="modal-body col-md-6">
                        
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Category</label>
                                <!-- <select class="form-control m-select2" id="m_select2_2"  name="cat_id" multiple="multiple" > -->
                                <select class="form-control" id="m_select2_2"  name="cat_id">
                                <option>Select</option>

                                    <?php
                                    foreach ($category as $k4 => $v4) {
                                    ?>
                                        <option value="<?php echo $v4['cat_id'] ?>"><?php echo $v4['cat_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label">Product Name</label>
                                <input type="text" class="form-control" name="pro_name">                   
                            </div>
                        </div>
                        <!-- <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Product Image</label>
                                <input type="file" name="image" class="form-control"/>
                            </div>
                        </div> -->


                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Product PDF Title</label>
                                <input type="text" class="form-control" name="product_pdf_title">                   
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Product PDF Upload</label>
                                <input type="file" name="pdf" class="form-control"/>

                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Product Description</label>
                                <textarea  rows="20" cols="100" name="pro_description" class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label">Description</label>
                                <textarea  rows="20" cols="100" name="career_highlights" class="form-control" ></textarea>
                            </div>
                        </div>


                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                        </div>

                    </div>


            </div>
        </div>
    </div>
</div>

