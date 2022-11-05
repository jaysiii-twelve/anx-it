<?php require_once '../../../private/initialize.php'; ?>
<?php $active_page = 'Dass' ?>
<?php $title_page = 'Dass' ?>
<?php include(SHARED_PATH . '/psychiatrist_header.php') ?>
</style>

<div class="content-wrapper" id="vue-dass">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List of Dass Questionnaire
                    <a data-toggle="modal" data-target="#addQuestionnaireModal" class="btn btn-light btn-sm font-weight-bold ml-2" style="cursor: pointer;"><i class="fa fa-plus"></i></a>
                </h5>


                <dass-questionnaire-datatable
                    :questionnaires="questionnaires">
                </dass-questionnaire-datatable>
            </div>
        </div>

	    <!--start overlay-->
        <div class="overlay toggle-menu"></div>
		<!--end overlay-->


        <!-- Add Modal -->
        <div class="modal fade" id="addQuestionnaireModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addQuestionnaireModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark">Add Dass Questionnaire</h5>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <textarea class="modal-form-control" placeholder="Question" v-model="description" style="width: 100%">
                            </textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="number" class="modal-form-control" placeholder="Choices One" v-model="dassChoicesOne" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices One Description" v-model="dassChoicesOneDescription" style="width: 100%">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="number" class="modal-form-control" placeholder="Choices Two" v-model="dassChoicesTwo" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices Two Description" v-model="dassChoicesTwoDescription" style="width: 100%">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="number" class="modal-form-control" placeholder="Choices Three" v-model="dassChoicesThree" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices Three Description" v-model="dassChoicesThreeDescription" style="width: 100%">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="number" class="modal-form-control" placeholder="Choices Four" v-model="dassChoicesFour" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices Four" v-model="dassChoicesFourDescription" style="width: 100%">
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button @click="addDassQuestionnaire" type="button" class="btn btn-info">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Update Modal -->
        <div class="modal fade" id="updateQuestionnaireModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateQuestionnaireModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark">Update Dass Questionnaire</h5>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <textarea class="modal-form-control" placeholder="Question" v-model="description" style="width: 100%">
                            </textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="number" class="modal-form-control" placeholder="Choices One" v-model="dassChoicesOne" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices One Description" v-model="dassChoicesOneDescription" style="width: 100%">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="number" class="modal-form-control" placeholder="Choices Two" v-model="dassChoicesTwo" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices Two Description" v-model="dassChoicesTwoDescription" style="width: 100%">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="number" class="modal-form-control" placeholder="Choices Three" v-model="dassChoicesThree" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices Three Description" v-model="dassChoicesThreeDescription" style="width: 100%">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="number" class="modal-form-control" placeholder="Choices Four" v-model="dassChoicesFour" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices Four" v-model="dassChoicesFourDescription" style="width: 100%">
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button @click="updateDassQuestionnaire" type="button" class="btn btn-info">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
		
    </div>
    <!-- End container-fluid-->
</div><!--End content-wrapper-->

<?php include(SHARED_PATH . '/psychiatrist/dass/dass_footer.php') ?>