<?php require_once '../../../private/initialize.php'; ?>
<?php $active_page = 'KESSLER-SURVEY' ?>
<?php $title_page = 'KESSLER-SURVEY' ?>
<?php include(SHARED_PATH . '/psychiatrist_header.php') ?>

<div class="content-wrapper" id="vue-kessler-survey">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List of Kessler - Survey</h5>


                <k-management-datatable
                    :ks="ks"></k-management-datatable>
            </div>
        </div>




	    <!--start overlay-->
        <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
</div><!--End content-wrapper-->

<?php include(SHARED_PATH . '/psychiatrist/kessler/kessler_survey_footer.php') ?>