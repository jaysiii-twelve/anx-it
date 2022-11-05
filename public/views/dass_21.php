<?php require_once '../../private/initialize.php'; ?>
<?php $active_page = 'DASS-21' ?>
<?php $title_page = 'DASS-21' ?>
<?php include(SHARED_PATH . '/header.php') ?>

<div class="content-wrapper" id="vue-dass-21">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List of DASS - 21
                    <a @click="redirectToCreate" class="btn btn-light btn-sm font-weight-bold ml-2" style="cursor: pointer;"><i class="fa fa-plus"></i></a>
                </h5>


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

<?php include(SHARED_PATH . '/dass_21/dass_21_footer.php') ?>