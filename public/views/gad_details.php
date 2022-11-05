<?php require_once '../../private/initialize.php'; ?>
<?php $active_page = 'GAD-7' ?>
<?php $title_page = 'GAD-7 Details' ?>
<?php include(SHARED_PATH . '/header.php') ?>


<div class="content-wrapper" id="vue-gad-details">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h3 class="pb-2">Generalized Anxiety Disorder 7 - Item (GAD - 7) Scale</h3>

                <hr>
                <div v-for="(gadDetail, index) in gadDetails">
                    <p class="pb-2 mt-2"><b> {{gadDetail.Description}} </b></p>
                    <div class="form-row ml-3">
                        
                        <div class="form-group col-3">
                            <input type="radio" :name="gadDetail.gadName" :value="gadDetail.GadChoicesOne" :checked="gadDetail.GadChoicesOne == gadDetail.Value" :disabled="gadDetail.GadChoicesOne != gadDetail.Value">
                            <label for="gadDetail.gadName">{{gadDetail.GadChoicesOneDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="gadDetail.gadName" :value="gadDetail.GadChoicesTwo" :checked="gadDetail.GadChoicesTwo == gadDetail.Value" :disabled="gadDetail.GadChoicesTwo != gadDetail.Value">
                            <label for="gadDetail.gadName">{{gadDetail.GadChoicesTwoDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="gadDetail.gadName" :value="gadDetail.GadChoicesThree" :checked="gadDetail.GadChoicesThree == gadDetail.Value" :disabled="gadDetail.GadChoicesThree != gadDetail.Value">
                            <label for="gadDetail.gadName">{{gadDetail.GadChoicesThreeDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="gadDetail.gadName" :value="gadDetail.GadChoicesFour" :checked="gadDetail.GadChoicesFour == gadDetail.Value" :disabled="gadDetail.GadChoicesFour != gadDetail.Value">
                            <label for="gadDetail.gadName">{{gadDetail.GadChoicesFourDescription}}</label>
                        </div>
                    </div>
                    <hr>
                </div>
                
                <div class="form-row mt-5">
                    <div class="form-group col-12">
                        <button @click="redirectToMain" class="btn btn-light float-right ml-3">Back to Previous</button>
                        <button @click="printPage" class="btn btn-light float-right ml-3">Print</button>
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

<?php include(SHARED_PATH . '/gad_7/gad_7_details_footer.php') ?>