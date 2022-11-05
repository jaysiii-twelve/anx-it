<?php require_once '../../../private/initialize.php'; ?>
<?php $active_page = 'DASS-SURVEY' ?>
<?php $title_page = 'DASS-SURVEY Details' ?>
<?php include(SHARED_PATH . '/psychiatrist_header.php') ?>

<div class="content-wrapper" id="vue-dass-survey-details">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h3 class="pb-2">Depression, Anxiety and Stress  21 - Item (DASS - 21)</h3>

                <hr>
                <div v-for="(dassDetail, index) in dassDetails">
                    <p class="pb-2 mt-2"><b> {{dassDetail.Description}} </b></p>
                    <div class="form-row ml-3">
                        
                        <div class="form-group col-3">
                            <input type="radio" :name="dassDetail.dassName" :value="dassDetail.DassChoicesOne" :checked="dassDetail.DassChoicesOne == dassDetail.Value" :disabled="dassDetail.DassChoicesOne != dassDetail.Value">
                            <label for="dassDetail.dassName">{{dassDetail.DassChoicesOneDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="dassDetail.dassName" :value="dassDetail.DassChoicesTwo" :checked="dassDetail.DassChoicesTwo == dassDetail.Value" :disabled="dassDetail.DassChoicesTwo != dassDetail.Value">
                            <label for="dassDetail.dassName">{{dassDetail.DassChoicesTwoDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="dassDetail.dassName" :value="dassDetail.DassChoicesThree" :checked="dassDetail.DassChoicesThree == dassDetail.Value" :disabled="dassDetail.DassChoicesThree != dassDetail.Value">
                            <label for="dassDetail.dassName">{{dassDetail.DassChoicesThreeDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="dassDetail.dassName" :value="dassDetail.DassChoicesFour" :checked="dassDetail.DassChoicesFour == dassDetail.Value" :disabled="dassDetail.DassChoicesFour != dassDetail.Value">
                            <label for="dassDetail.dassName">{{dassDetail.DassChoicesFourDescription}}</label>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="form-row mt-5">
                    <div class="form-group col-12">
                        <button @click="redirectToMain"  class="btn btn-light float-right ml-3">Back to Previous</button>
                        <button @click="printPage" class="btn btn-light float-right">Print</button>
                        
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

<?php include(SHARED_PATH . '/psychiatrist/dass/dass_survey_details_footer.php') ?>