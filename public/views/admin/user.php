<?php require_once '../../../private/initialize.php'; ?>
<?php $active_page = 'User' ?>
<?php $title_page = 'User' ?>
<?php include(SHARED_PATH . '/admin_header.php') ?>
</style>

<div class="content-wrapper" id="vue-user">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List of User
                    <!-- <a @click="redirectToCreate" class="btn btn-light btn-sm font-weight-bold ml-2" style="cursor: pointer;"><i class="fa fa-plus"></i></a> -->
                </h5>


                <user-management-datatable
                    :users="users"></user-management-datatable>
            </div>
        </div>




	    <!--start overlay-->
        <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
</div><!--End content-wrapper-->

<?php include(SHARED_PATH . '/admin/user/user_footer.php') ?>