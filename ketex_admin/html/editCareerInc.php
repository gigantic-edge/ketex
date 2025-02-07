<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="editProfile.php">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            Edit Profile</h3>
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
                                Edit Profile <?php echo $singleproarr['name'] ?>
                            </h3>
                        </div>
                    </div>

                </div>
                <form class="m-form m-form--fit m-form--label-align-right" method="post" action="db_edit_career.php"  enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php echo $singleproarr['id'] ?>" required> 

                    <div class="m-portlet__body col-md-6">
                       <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $singleproarr['name'] ?>" required readonly>                         
                            </div>
                        </div>

                       <div class="col-md-12">
                            <div class="form-group m-form__group row">
                               <!-- <label class="col-form-label ">Image (Image size - 300px(w) x 450px(h))</label> -->
                               <!-- <input type="file" name="emp_img" id="image" class="form-control"/> -->
                                <?php if ($singleproarr['emp_img'] != '') { ?>
                                    <img src="<?php echo $database->base_url . $database->document_path_site_image . $singleproarr['emp_img']; ?>" width="200px"  />
        <!--                                                        <br><span>Image Size 2600 x 500</span>-->
                                <?php } ?>                        
                            </div>
                        </div>
                       
                       

                     
                        <!--<div class="col-md-12">-->
                        <!--    <div class="form-group m-form__group row">-->
                        <!--        <label class="col-form-label ">Functional Area</label>-->
                        <!--        <select class="form-control m-select2" id="m_select2_3" name="attribute2[]" multiple="multiple" >-->
                                    <?php
                                   // if (!empty($attribute2arr)) {
                                      //  $i = 1;
                                       // $strtag = '';
                                       // foreach ($attribute2arr as $k1 => $v1) {


                                          //  if ($cntattribute2tag == $i) {
                                           //     $strtag .= $v1['pa_attribute_value_id'];
                                          //  } else {
                                            //    $strtag .= $v1['pa_attribute_value_id'] . ",";
                                          //  }
                                            ?>
                                            <option value="<?php //echo $v1['pa_attribute_value_id'] ?>" selected><?php// echo $v1['value'] ?></option>
                                            <?php
                                            $i++;
                                      //  }
                                  //  }
                                    ?>  
                                    <?php
                                   // foreach ($attribute2valuearr as $k4 => $v4) {
                                        ?>
                                        <option value="<?php// echo $v4['id'] ?>"><?php //echo $v4['value'] ?></option>
                                        <?php
                                  //  }
                                    ?>
                        <!--        </select>-->
                        <!--    </div>-->
                        <!--</div>-->


                        <!--<div class="col-md-12">-->
                        <!--    <div class="form-group m-form__group row">-->
                        <!--        <label class="col-form-label ">Workex Total</label>-->
                        <!--        <input type="text" name="workex_total" class="form-control" value="<?php// echo $singleproarr['workex_total'] ?>"/>-->

                        <!--    </div>-->
                        <!--</div>-->
                       
                       
                       
                       
                        
                    

                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label "> Body </label>
                            <!--    <input type="hidden" name="body" value="<?php// echo $singleproarr['body']; ?>"> -->

                                <textarea  rows="20" cols="100" name="body" class="form-control">
                                    <?php echo isset($singleproarr['career_highlights']) ? htmlspecialchars_decode($singleproarr['career_highlights']) : ''; ?>
                                    <?php if($singleproarr['body'] !='') {?>
                                    <?php echo $singleproarr['body'] ?>
                                    <?php } ?>

                                </textarea>
                            </div>
                        </div>
                        <!--<div class="col-md-12">-->
                        <!--    <div class="form-group m-form__group row">-->
                        <!--        <label class="col-form-label ">Achievements</label>-->
    <!--                            <input type="hidden" name="achievements" value="<?php //echo $singleproarr['achievements']; ?>">-->

                                <!--<textarea name="achievements" rows="20" cols="100" class="form-control">-->
                                    <?php //echo isset($singleproarr['achievements']) ? htmlspecialchars_decode($singleproarr['achievements']) : ''; ?>

                        <!--        </textarea>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="col-md-12">-->
                        <!--    <div class="form-group m-form__group row">-->
                        <!--        <label class="col-form-label ">Certifications</label>-->
    <!--                            <input type="hidden" name="certifications" value="<?php echo $singleproarr['certifications']; ?>">-->

                                <!--<textarea name="certifications" rows="20" cols="100" class="form-control">-->
                                    <?php //echo isset($singleproarr['certifications']) ? htmlspecialchars_decode($singleproarr['certifications']) : ''; ?>

                        <!--        </textarea>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="col-md-12">-->
                        <!--    <div class="form-group m-form__group row">-->
                        <!--        <label class="col-form-label ">Linkedin</label>-->
                        <!--        <input type="text" name="linkedin" class="form-control" value="<?php //echo $singleproarr['linkedin'] ?>"/>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="col-md-12">-->
                        <!--    <div class="form-group m-form__group row">-->
                        <!--        <label class="col-form-label ">Video Profile</label>-->
                        <!--        <input type="text" name="video_profile" class="form-control" value="<?php// echo $singleproarr['video_profile'] ?>"/>-->
                        <!--    </div>-->
                        <!--</div>-->
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
