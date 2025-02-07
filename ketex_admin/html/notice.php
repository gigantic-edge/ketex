<style>
    .view_count{
        background: #e0e0e0;
        padding: 5px;
        position: relative;
        top: 16px;
        font-size: 10px;
    }
</style>

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <a href="notice.php">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            Notice Board</h3>
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
        <!-- <div class="m-content">
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
            </div> -->
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <button type="button" class="btn btn-success" onclick="window.location.href = 'add_notice_a.php'">Add Notice</button>

                        </div>
                    </div>
                </div>

                <div class="m-portlet__body">

                    <div class="m-portlet m-portlet--mobile">


                        <div class="table-responsive" id="modelTable">

                        <!-- <div class="row">

                            <div class="col-md-4">


                                <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" required value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} ?>" class="form-control" placeholder="search data">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                                </form>
                            </div>
                        </div> -->
<!-- 
                            <script type="text/javascript">
                                 $(document).ready(function () {
                                    $('#dtBasicExample').DataTable();
                                    $('.dataTables_length').addClass('bs-select');
                                 });
                            </script> -->


                            <table  class="table table-striped- table-bordered table-hover table-checkable" id="dtBasicExample" cellspacing="0" width="100%">
                                <thead>
                                    <tr>

                                        <th>SL NO</th>
                                        <th>NOTICE TITLE</th>
                                        <th>NOTICE IMAGE</th>
                                        <th>NOTICE DATE</th>
                                        <!-- <th>NOTICE CONTENT</th> -->
                                        <th>ACTION</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (!empty($noticedetails)):
                                        $i = 1;
                                        foreach ($noticedetails as $k => $v):
                                            ?>
                                            <tr text>
                                                <td  class="text-center"><?php echo $i; ?></td>
                                                <td> <b><?php echo $v['title'] ?></b></td>
                                                <td> <?php if ($v['image'] != '') { ?>

                                                    <img src="<?php echo $database->base_url . $database->document_path_site_image . $v['image']; ?>" width="100"/>
                                                    <?php } ?>
                                                </td>
                                                <td> <b><?php echo $v['date'] ?></b></td>
                                                <!-- <td> <b><?php echo $v['content'] ?></b></td> -->
                                                <td><a class="btn btn-info btn-sm" href="edit_notice_a.php?id=<?php echo $v['id'] ?>">Edit</a></td>
                                              
                                            </tr>
                                            <?php
                                            $i++;
                                        endforeach;

                                    endif;

                                   
                                    ?>
                                </tbody>

                            </table>

                            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
        <script src="js/datatables/datatables.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('.datatable').dataTable({
                "sPaginationType": "bs_four_button"
            }); 
            $('.datatable').each(function(){
                var datatable = $(this);
                // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                search_input.attr('placeholder', 'Search');
                search_input.addClass('form-control input-sm');
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.addClass('form-control input-sm');
            });
        });
        </script>
                        
                        </div>
                    </div> 

                    <div class="m-portlet__foot m-portlet__foot--fit">

                        <div class="m-form__actions">


                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>