<?php require_once '../../private/initialize.php'; ?>
<?php $active_page = 'GAD-7' ?>
<?php $title_page = 'GAD-7' ?>
<?php include(SHARED_PATH . '/header.php') ?>
</style>

<div class="content-wrapper" id="vue-gad-7">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List of GAD - 7
                    <a @click="redirectToCreate" class="btn btn-light btn-sm font-weight-bold ml-2" style="cursor: pointer;"><i class="fa fa-plus"></i></a>
                </h5>


                <gad-management-datatable
                    :gads="gads"></gad-management-datatable>
            </div>
        </div>




	    <!--start overlay-->
        <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
</div><!--End content-wrapper-->

<?php include(SHARED_PATH . '/gad_7/gad_7_footer.php') ?>