<?php require_once '../../private/initialize.php'; ?>
<?php $active_page = 'Dashboard' ?>
<?php $title_page = 'Dashboard' ?>
<?php include(SHARED_PATH . '/header.php') ?>

<div class="content-wrapper" id="vue-dashboard">
    <div class="container-fluid">
        <!--Start Dashboard Content-->
	    <div class="card mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-6 col-xl-4 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">GAD - 7 <span class="float-right"><i class="fa fa-book"></i></span></h5>
                                <hr>
                            <p class="mb-0 text-white small-font">Total Survey <span class="float-right">{{gads.length}}</span></p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-4 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">DASS - 21 <span class="float-right"><i class="fa fa-book"></i></span></h5>
                                <hr>
                            <p class="mb-0 text-white small-font">Total Survey <span class="float-right">{{dasses.length}}</span></p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-4 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">K10+ <span class="float-right"><i class="fa fa-book"></i></span></h5>
                                <hr>
                            <p class="mb-0 text-white small-font">Total Survey<span class="float-right">{{ks.length}}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-6 col-xl-12 border-light">
                        <div class="card-body">
                            <h4 class="text-white mb-0">What is GAD - 7 ? </h4>

                            <p class="mb-0 mt-3 text-white small-font">
                                Having some trouble in your life? Want to try GAD-7 Anxiety Scale?
                            </p>
                                
                            <p class="mb-0 mt-3 text-white small-font">
                               
                                The Generalized Anxiety Disorder scale (GAD-7)
                                is one of the most frequently 
                                used diagnostic self-report scales for screening,
                                diagnosis and severity assessment of anxiety disorder. 

                            </p>

                            <button @click="redirectToGadSurvey" class="btn btn-light btn-block mt-3">Proceed to survey</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <div class="card mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-6 col-xl-12 border-light">
                        <div class="card-body">
                            <h4 class="text-white mb-0">What is Dass - 21 ? </h4>

                            <p class="mb-0 mt-3 text-white small-font">
                                Having some trouble in your life? DASS-21 is good for measuring emotional stress and anxiety. If you’re not feeling well mental, give this a try.
                            </p>
                                
                            <p class="mb-0 mt-3 text-white small-font">
                            
                                The DASS-21 is a self-report test which measures your level of Depression, Anxiety and Stress.
                                At the end of the test, you will receive a severity rating of Normal, Mild, Moderate, Severe or
                                Extremely Severe, for each of those 3 negative emotional states. 

                            </p>

                            <button @click="redirectToDassSurvey" class="btn btn-light btn-block mt-3">Proceed to survey</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <div class="card mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-6 col-xl-12 border-light">
                        <div class="card-body">
                            <h4 class="text-white mb-0">What is K10+ ? </h4>

                            <p class="mb-0 mt-3 text-white small-font">

                                The Kessler Psychological Distress Scale (K10) is a simple measure of psychological distress.
                                The K10 scale involves 10 questions about emotional states each with a five-level response scale.
                                The measure can be used as a brief screen to identify levels of distress.

                            </p>

                            <button @click="redirectToKesslerSurvey" class="btn btn-light btn-block mt-3">Proceed to survey</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <!--End Dashboard Content-->
	    <!--start overlay-->
        <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
</div><!--End content-wrapper-->


<?php include(SHARED_PATH . '/dashboard/dashboard_footer.php') ?>