<?php require_once '../../private/initialize.php'; ?>
<?php $active_page = 'KESSLER-10' ?>
<?php $title_page = 'KESSLER-10' ?>
<?php include(SHARED_PATH . '/header.php') ?>

<div class="content-wrapper" id="vue-k">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List of Kessler - 10
                    <a @click="redirectToCreate" class="btn btn-light btn-sm font-weight-bold ml-2" style="cursor: pointer;"><i class="fa fa-plus"></i></a>
                </h5>


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

<?php include(SHARED_PATH . '/kessler_10/kessler_10_footer.php') ?>