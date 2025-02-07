<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="editProfile.php.php">
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
                                Add Profile
                            </h3>
                        </div>
                    </div>

                </div>
                <form method="post" action="db_add_profile.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Name</label>
                                <input type="text" class="form-control" name="name" required>                   
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Email</label>
                                <input type="text" name="email" class="form-control"/>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Phone</label>
                                <input type="text" name="phone" class="form-control" />

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Linkedin</label>
                                <input type="text" name="link" class="form-control" />

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Image</label>
                                <input type="file" name="image" class="form-control"/>

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
</div>
