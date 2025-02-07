<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="profile.php">
                        <h3 class="m-subheader__title m-subheader__title--separator">Journey Add </h3>
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
                <form method="post" action="addJourneyData.php" enctype="multipart/form-data">
                    <div class="modal-body col-md-12">
                        <div class="col-md-3">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Year</label>
                                <input type="text" class="form-control" name="year" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label ">Discription</label>
                                <textarea name="description" class="form-control" required></textarea>
                            </div>
                        </div>
                        
                        
                        <div class="m-portlet__foot m-portlet__foot--fit" style="clear: both;">
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