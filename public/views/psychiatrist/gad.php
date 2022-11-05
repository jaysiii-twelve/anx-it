<?php require_once '../../../private/initialize.php'; ?>
<?php $active_page = 'Gad' ?>
<?php $title_page = 'Gad' ?>
<?php include(SHARED_PATH . '/psychiatrist_header.php') ?>
</style>

<div class="content-wrapper" id="vue-gad">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List of Gad Questionnaire
                    <a data-toggle="modal" data-target="#addQuestionnaireModal" class="btn btn-light btn-sm font-weight-bold ml-2" style="cursor: pointer;"><i class="fa fa-plus"></i></a>
                </h5>


                <gad-questionnaire-datatable
                    :questionnaires="questionnaires">
                </gad-questionnaire-datatable>
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
                    <h5 class="modal-title text-dark">Add Gad Questionnaire</h5>
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
                            <input type="number" class="modal-form-control" placeholder="Choices One" v-model="choicesOne" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices One Description" v-model="choicesOneDescription" style="width: 100%">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="number" class="modal-form-control" placeholder="Choices Two" v-model="choicesTwo" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices Two Description" v-model="choicesTwoDescription" style="width: 100%">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="number" class="modal-form-control" placeholder="Choices Three" v-model="choicesThree" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices Three Description" v-model="choicesThreeDescription" style="width: 100%">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="number" class="modal-form-control" placeholder="Choices Four" v-model="choicesFour" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices Four" v-model="choicesFourDescription" style="width: 100%">
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button @click="addGadQuestionnaire" type="button" class="btn btn-info">Add</button>
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
                    <h5 class="modal-title text-dark">Update Gad Questionnaire</h5>
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
                            <input type="number" class="modal-form-control" placeholder="Choices One" v-model="choicesOne" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices One Description" v-model="choicesOneDescription" style="width: 100%">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="number" class="modal-form-control" placeholder="Choices Two" v-model="choicesTwo" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices Two Description" v-model="choicesTwoDescription" style="width: 100%">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="number" class="modal-form-control" placeholder="Choices Three" v-model="choicesThree" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices Three Description" v-model="choicesThreeDescription" style="width: 100%">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="number" class="modal-form-control" placeholder="Choices Four" v-model="choicesFour" style="width: 100%">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="modal-form-control" placeholder="Choices Four" v-model="choicesFourDescription" style="width: 100%">
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button @click="updateGadQuestionnaire" type="button" class="btn btn-info">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
		
    </div>
    <!-- End container-fluid-->
</div><!--End content-wrapper-->

<?php include(SHARED_PATH . '/psychiatrist/gad/gad_footer.php') ?>