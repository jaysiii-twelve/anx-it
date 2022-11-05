<?php require_once '../../../private/initialize.php'; ?>
<?php $active_page = 'MESSAGES' ?>
<?php $title_page = 'MESSAGES' ?>
<?php include(SHARED_PATH . '/psychiatrist_header.php') ?>

<div class="content-wrapper" id="vue-messages">
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-6 col-xl-12 border-light">
                        <div class="card-body">
                            <user-management-datatable
                                :users="users"></user-management-datatable>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End container-fluid-->
</div><!--End content-wrapper-->


<?php include(SHARED_PATH . '/psychiatrist/messages/messages_footer.php') ?>