<?php require_once '../../private/initialize.php'; ?>
<?php $active_page = 'KESSLER-10' ?>
<?php $title_page = 'KESSLER - 10 Details' ?>
<?php include(SHARED_PATH . '/header.php') ?>

<div class="content-wrapper" id="vue-kessler-details">
<div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <h3 class="pb-2">Kessler Psychological Distress Scale (K-10)</h3>

                <hr>
                <div v-for="(kesslerDetail, index) in kesslerDetails">
                    <p class="pb-2 mt-2"><b> {{kesslerDetail.Description}} </b></p>
                    <div class="form-row ml-3">
                        
                        <div class="form-group col-3">
                            <input type="radio" :name="kesslerDetail.kesslerName" :value="kesslerDetail.KesslerChoicesOne" :checked="kesslerDetail.KesslerChoicesOne == kesslerDetail.Value" :disabled="kesslerDetail.KesslerChoicesOne != kesslerDetail.Value">
                            <label for="kesslerDetail.kesslerName">{{kesslerDetail.KesslerChoicesOneDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="kesslerDetail.kesslerName" :value="kesslerDetail.KesslerChoicesTwo" :checked="kesslerDetail.KesslerChoicesTwo == kesslerDetail.Value" :disabled="kesslerDetail.KesslerChoicesTwo != kesslerDetail.Value">
                            <label for="kesslerDetail.kesslerName">{{kesslerDetail.KesslerChoicesTwoDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="kesslerDetail.kesslerName" :value="kesslerDetail.KesslerChoicesThree" :checked="kesslerDetail.KesslerChoicesThree == kesslerDetail.Value" :disabled="kesslerDetail.KesslerChoicesThree != kesslerDetail.Value">
                            <label for="kesslerDetail.kesslerName">{{kesslerDetail.KesslerChoicesThreeDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="kesslerDetail.kesslerName" :value="kesslerDetail.KesslerChoicesFour" :checked="kesslerDetail.KesslerChoicesFour == kesslerDetail.Value" :disabled="kesslerDetail.KesslerChoicesFour != kesslerDetail.Value">
                            <label for="kesslerDetail.kesslerName">{{kesslerDetail.KesslerChoicesFourDescription}}</label>
                        </div>
                        <div class="form-group col-3">
                            <input type="radio" :name="kesslerDetail.kesslerName" :value="kesslerDetail.KesslerChoicesFive" :checked="kesslerDetail.KesslerChoicesFive == kesslerDetail.Value" :disabled="kesslerDetail.KesslerChoicesFive != kesslerDetail.Value">
                            <label for="kesslerDetail.kesslerName">{{kesslerDetail.KesslerChoicesFiveDescription}}</label>
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

<?php include(SHARED_PATH . '/kessler_10/kessler_10_details_footer.php') ?>