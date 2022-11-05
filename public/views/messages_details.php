<?php require_once '../../private/initialize.php'; ?>
<?php $active_page = 'MESSAGES' ?>
<?php $title_page = 'MESSAGES' ?>
<?php include(SHARED_PATH . '/header.php') ?>

<div class="content-wrapper" id="vue-messages-details">
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-6 col-xl-12 border-light">
                        <div class="card-body">
                            <div class="card-content p-2">
                                <div class="chat-header">
                                    <a href="messages.php" class="back-icon"><i class="zmdi zmdi-arrow-left"></i></a>
                                    <div class="details">
                                        <span>{{fullName}}</span>
                                    </div>
                                </div>
                                
                                <div class="chat-box">
                                    <div v-for="message in messages">
                                        <div v-if="<?php echo $_SESSION['UserId']; ?> == message.SenderId">
                                            <div class="chat outgoing">
                                                <div class="details">
                                                    <p>{{message.Text}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-else>
                                            <div class="chat incoming">
                                                <div class="details">
                                                    <p>{{message.Text}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="chat-box">
                                    

                                   
                                </div> -->

                                <div class="card-footer text-center py-3">
                                    <div class="form-row mt-5">
                                        <div class="form-group col-12">
                                            <button @click="saveMessage" class="btn btn-light float-right ml-2"><i class="zmdi zmdi-mail-send"></i></button>
                                            <input type="text" class="form-control input-shadow float-right " placeholder="Enter message" v-model="messageText" style="width: 90%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End container-fluid-->
</div><!--End content-wrapper-->


<?php include(SHARED_PATH . '/messages/messages_details_footer.php') ?>