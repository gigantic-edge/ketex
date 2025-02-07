
<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="product_details.php">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                             Add Product Multiple Image </h3>
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
                <form method="post" action="db_add_image.php" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $profileid ?>"> 
                <input type="hidden" name="pro_name" value="<?php echo $pro_name ?>">
                <div class="m-portlet__body col-md-6">
                    <div class="col-md-5">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Product Name</label>
                                <input type="text" class="form-control" name="cat_name" value="<?php echo $pro_name ?>">
                            </div>
                    </div>
                </div>

                <div class="m-portlet__body col-md-6">
                            <div class="col-md-5">
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label ">Side Product Image</label>
                                    <input type="file" name="product_img[]"  class="form-control" multiple/>
                                </div>
                            </div>
                        </div>

                        
                    <div class="m-portlet__body col-md-6">
                        <div class="col-md-5">
                            <div class="form-group m-form__group row">
                                <input type="hidden" name="image_position" value="0">
                            </div>
                        </div>
                    </div>


                        <!-- <div class="m-portlet__body col-md-6">
                            <div class="col-md-5">
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label">Side Image</label>

                                    <select class="form-control" id="m_select" name="image_position">
                                        <option value="0">Side Image</option>
                                    </select>

                                </div>
                            </div>
                        </div> -->



                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                </form>




                 <?php
                   foreach ($productdetail as $k4 => $v4) {

                ?>

                

                    <input type="hidden" name="id" value="<?php echo $v4['pro_id'] ?>"> 

                        <div class="m-portlet__body col-md-6">
                            <div class="col-md-12">
                                

                            </div>


                             <div class="col-md-12">

                               
                                <img src="<?php echo $database->base_url . $database->document_path_site_image . $v4['product_img']; ?>" width="150px"  />&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                

                                <a class="btn btn-danger" href="productimg_delete.php?id=<?php echo $v4['proimg_id'] ?>">Delete</a><br>
                                <div>
                                
                                <!-- <?php 
                                    if($v4['image_position'] == '1'){

                                        echo '<p><a href="status.php?ID='.$v4['proimg_id'].'&pro_id='.$v4['pro_id'].'" class="fas fa-toggle-on" style=font-size:20px;color:green> Main Image </a></p>';
                                        
                                    }
                                    else{

                                        echo '<p><a href="status.php?ID='.$v4['proimg_id'].'&pro_id='.$v4['pro_id'].'" class="fas fa-toggle-off" style=font-size:20px;color:red>  </a></p>';
                                    }
                                                          
                                ?> -->
                                
                                </div>
                            </div>
                        </div> 
                        <?php
                        }
                        
                   
                     ?>


                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    document.getElementById("curtainInput").addEventListener(
  "click",
  function(event) {
    if (event.target.value === "Open Curtain") {
      event.target.value = "Close Curtain";
    } else {
      event.target.value = "Open Curtain";
    }
  },
  false
);
</script> -->
