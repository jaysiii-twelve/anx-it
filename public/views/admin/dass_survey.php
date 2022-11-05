<?php require_once '../../../private/initialize.php'; ?>
<?php $active_page = 'DASS-SURVEY' ?>
<?php $title_page = 'DASS-SURVEY' ?>
<?php include(SHARED_PATH . '/admin_header.php') ?>

<div class="content-wrapper" id="vue-dass-survey">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List of DASS - Survey</h5>


                <dass-management-datatable
                    :dasses="dasses"></dass-management-datatable>
            </div>
        </div>




	    <!--start overlay-->
        <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
</div><!--End content-wrapper-->

<?php include(SHARED_PATH . '/admin/dass/dass_survey_footer.php') ?>