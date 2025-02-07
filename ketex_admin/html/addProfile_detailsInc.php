<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="addProfile.php">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            Add Profile</h3>
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
                                Add Profile
                            </h3>
                        </div>
                    </div>

                </div>
                <form method="post" action="db_add_profile.php" enctype="multipart/form-data">
                    <div class="modal-body col-md-6">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Brochure Id</label>
                                <input type="text" class="form-control" name="brochure_id" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Name</label>
                                <input type="text" class="form-control" name="name" required>                   
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Image (Image size - 300px(w) x 450px(h))</label>
                                <input type="file" name="image" class="form-control"/>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Roll No</label>
                                <input type="text" name="roll_no" class="form-control"/>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Age</label>
                                <input type="text" name="age" class="form-control"/>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Gender</label>
                                <select class="form-control " name="gender" >
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>

                                </select>
                            </div>
                        </div><div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Short Bio </label>
                                <input type="text" name="short_bio" class="form-control" />

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Long Bio </label>
                                <input type="text" name="long_bio" class="form-control" />

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Education 1 </label>
                                <input type="text" name="education1" class="form-control" />

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Education 2 </label>
                                <input type="text" name="education2" class="form-control" />

                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Industry</label>
                                <select class="form-control m-select2" id="m_select2_2"  name="attribute1[]" multiple="multiple" >
                                    <?php
                                    foreach ($attribute1arr as $k4 => $v4) {
                                        ?>
                                        <option value="<?php echo $v4['id'] ?>"><?php echo $v4['value'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Functional Area</label>
                                <select class="form-control m-select2" id="m_select2_3"  name="attribute2[]" multiple="multiple" >
                                    <?php
                                    foreach ($attribute2arr as $k4 => $v4) {
                                        ?>
                                        <option value="<?php echo $v4['id'] ?>"><?php echo $v4['value'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Workex Total</label>
                                <input type="text" name="workex_total" class="form-control" />

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Company Name 1</label>
                                <input type="text" name="co_name_1" class="form-control" />

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Company Experience 1</label>
                                <input type="text" name="co_exp_1" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Company Name 2</label>
                                <input type="text" name="co_name_2" class="form-control" />

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Company Experience 2</label>
                                <input type="text" name="co_exp_2" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Company Name 3</label>
                                <input type="text" name="co_name_3" class="form-control" />

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Company Experience 3</label>
                                <input type="text" name="co_exp_3" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Company Name 4</label>
                                <input type="text" name="co_name_4" class="form-control" />

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Company Experience 4</label>
                                <input type="text" name="co_exp_4" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Company Name 5</label>
                                <input type="text" name="co_name_5" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Company Experience 5</label>
                                <input type="text" name="co_exp_5" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">International Experience</label>
                                <input type="text" name="International_exp" class="form-control" />

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Career Highlights</label>
                                <textarea  rows="20" cols="100" name="career_highlights" class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Achievements</label>
                                <textarea name="achievements" rows="20" cols="100" class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Certifications</label>
                                <textarea name="certifications" rows="20" cols="100" class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Linkedin</label>
                                <input type="text" name="linkedin" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Video Profile</label>
                                <input type="text" name="video_profile" class="form-control" />
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

