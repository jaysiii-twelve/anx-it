<?php require_once '../../../private/initialize.php'; ?>
<?php $active_page = 'GAD-7 Survey' ?>
<?php $title_page = 'GAD-7 Survey' ?>
<?php include(SHARED_PATH . '/admin_header.php') ?>
</style>

<div class="content-wrapper" id="vue-gad-survey">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List of GAD - Survey</h5>


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

<?php include(SHARED_PATH . '/admin/gad/gad_survey_footer.php') ?>