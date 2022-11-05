<?php require_once '../../private/initialize.php'; ?>
<?php $active_page = 'GAD-7' ?>
<?php $title_page = 'GAD-7 Survey' ?>
<?php include(SHARED_PATH . '/header.php') ?>

<div class="content-wrapper" id="vue-add-gad-7">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h3 class="pb-2">Generalized Anxiety Disorder 7 - Item (GAD - 7) Scale</h3>

                <p class="pb-2 mt-4"><b>Over the last 2 weeks, how often have you been bothered by the following problems ?</b></p>
                <hr>
                <div v-for="(questionnaire, index) in questionnaires">
                    <p class="pb-2 mt-2"><b> {{questionnaire.Description}} </b></p>
                    <div class="form-row ml-3">
                        
                        <div class="form-group col-3">
                            <input type="radio" :name="getElementName(index)" :value="questionnaire.GadChoicesOne" @change="getAnswer(questionnaire.GadChoicesOne, questionnaire.GadQuestionnaireId)">
                            <label for="getElementName(index)">{{questionnaire.GadChoicesOneDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="getElementName(index)" :value="questionnaire.GadChoicesTwo" @change="getAnswer(questionnaire.GadChoicesTwo, questionnaire.GadQuestionnaireId)">
                            <label for="getElementName(index)">{{questionnaire.GadChoicesTwoDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="getElementName(index)" :value="questionnaire.GadChoicesThree" @change="getAnswer(questionnaire.GadChoicesThree, questionnaire.GadQuestionnaireId)">
                            <label for="getElementName(index)">{{questionnaire.GadChoicesThreeDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="getElementName(index)" :value="questionnaire.GadChoicesFour" @change="getAnswer(questionnaire.GadChoicesFour, questionnaire.GadQuestionnaireId)">
                            <label for="getElementName(index)">{{questionnaire.GadChoicesFourDescription}}</label>
                        </div>
                    </div>
                    <hr>
                </div>
                
                <div class="form-row mt-5">
                    <div class="form-group col-12">
                        <button @click="redirectToMain" class="btn btn-light float-right ml-3">Back to Previous</button>
                        <button @click="saveGad" class="btn btn-light float-right">Save</button>
                        
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

<?php include(SHARED_PATH . '/gad_7/add_gad_7_footer.php') ?>