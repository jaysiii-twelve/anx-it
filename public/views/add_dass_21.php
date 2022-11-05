<?php require_once '../../private/initialize.php'; ?>
<?php $active_page = 'DASS-21' ?>
<?php $title_page = 'DASS-21 Survey' ?>
<?php include(SHARED_PATH . '/header.php') ?>

<div class="content-wrapper" id="vue-add-dass-21">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h3 class="pb-2">Depression, Anxiety and Stress  21 - Item (DASS - 21)</h3>

                <p class="pb-2 mt-4"><b>Over the last 2 weeks, how often have you been bothered by the following problems ?</b></p>

                <hr>
                <div v-for="(questionnaire, index) in questionnaires">
                    <p class="pb-2 mt-2"><b> {{questionnaire.Description}} </b></p>
                    <div class="form-row ml-3">
                        
                        <div class="form-group col-3">
                            <input type="radio" :name="getElementName(index)" :value="questionnaire.DassChoicesOne" @change="getAnswer(questionnaire.DassChoicesOne, questionnaire.DassQuestionnaireId)">
                            <label for="getElementName(index)">{{questionnaire.DassChoicesOneDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="getElementName(index)" :value="questionnaire.DassChoicesTwo" @change="getAnswer(questionnaire.DassChoicesTwo, questionnaire.DassQuestionnaireId)">
                            <label for="getElementName(index)">{{questionnaire.DassChoicesTwoDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="getElementName(index)" :value="questionnaire.DassChoicesThree" @change="getAnswer(questionnaire.DassChoicesThree, questionnaire.DassQuestionnaireId)">
                            <label for="getElementName(index)">{{questionnaire.DassChoicesThreeDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="getElementName(index)" :value="questionnaire.DassChoicesFour" @change="getAnswer(questionnaire.DassChoicesFour, questionnaire.DassQuestionnaireId)">
                            <label for="getElementName(index)">{{questionnaire.DassChoicesFourDescription}}</label>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="form-row mt-5">
                    <div class="form-group col-12">
                        <button @click="redirectToMain"  class="btn btn-light float-right ml-3">Back to Previous</button>
                        <button @click="saveDass" class="btn btn-light float-right">Save</button>
                        
                    </div>
                </div>

            </div>
        </div>

	    <!--start overlay-->
        <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
</div><!--End content-wrapper-->

<?php include(SHARED_PATH . '/dass_21/add_dass_21_footer.php') ?>