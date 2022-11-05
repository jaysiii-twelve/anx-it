<?php require_once '../../private/initialize.php'; ?>
<?php $active_page = 'KESSLER-10' ?>
<?php $title_page = 'KESSLER-10 Survey' ?>
<?php include(SHARED_PATH . '/header.php') ?>

<div class="content-wrapper" id="vue-add-kessler-10">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h3 class="pb-2">Kessler Psychological Distress (KESSLER - 10) Scale</h3>

                <p class="pb-2 mt-4"><b>The following questions ask about how you have been feeling during the past 30 days. For each question, please circle the number that best describes how often you had this feeling.</b></p>
                <hr>
                <div v-for="(questionnaire, index) in questionnaires">
                    <p class="pb-2 mt-2"><b> {{questionnaire.Description}} </b></p>
                    <div class="form-row ml-3">
                        
                        <div class="form-group col-3">
                            <input type="radio" :name="getElementName(index)" :value="questionnaire.KesslerChoicesOne" @change="getAnswer(questionnaire.KesslerChoicesOne, questionnaire.KesslerQuestionnaireId)">
                            <label for="getElementName(index)">{{questionnaire.KesslerChoicesOneDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="getElementName(index)" :value="questionnaire.KesslerChoicesTwo" @change="getAnswer(questionnaire.KesslerChoicesTwo, questionnaire.KesslerQuestionnaireId)">
                            <label for="getElementName(index)">{{questionnaire.KesslerChoicesTwoDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="getElementName(index)" :value="questionnaire.KesslerChoicesThree" @change="getAnswer(questionnaire.KesslerChoicesThree, questionnaire.KesslerQuestionnaireId)">
                            <label for="getElementName(index)">{{questionnaire.KesslerChoicesThreeDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="getElementName(index)" :value="questionnaire.KesslerChoicesFour" @change="getAnswer(questionnaire.KesslerChoicesFour, questionnaire.KesslerQuestionnaireId)">
                            <label for="getElementName(index)">{{questionnaire.KesslerChoicesFourDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="getElementName(index)" :value="questionnaire.KesslerChoicesFive" @change="getAnswer(questionnaire.KesslerChoicesFive, questionnaire.KesslerQuestionnaireId)">
                            <label for="getElementName(index)">{{questionnaire.KesslerChoicesFiveDescription}}</label>
                        </div>
                    </div>
                    <hr>
                </div>
                
                <div class="form-row mt-5">
                    <div class="form-group col-12">
                        <button @click="redirectToMain" class="btn btn-light float-right ml-3">Back to Previous</button>
                        <button @click="saveKessler" class="btn btn-light float-right">Save</button>
                        
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

<?php include(SHARED_PATH . '/kessler_10/add_kessler_10_footer.php') ?>