<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAA - Gad 7 Recommendation</title>
</head>

    <!-- Jquery DataTable-->
    <link href="../../content/css/jquery_datatable.css" rel="stylesheet"/>
    <!-- loader-->
    <link href="../../content/css/pace.min.css" rel="stylesheet"/>
    <script src="../../content/js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="../../content/images/logo.png" type="image/ico" />
    <!-- Vector CSS -->
    <!-- <link href="../../content/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/> -->
    <!-- simplebar CSS-->
    <link href="../../content/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <!-- Bootstrap core CSS-->
    <link href="../../content/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Bootstrap core CSS-->
    <!-- <link href="../../content/css/bootstrap5.min.css" rel="stylesheet"/> -->
    <!-- animate CSS-->
    <link href="../../content/css/animate.css" rel="stylesheet" type="text/css"/>
    <!-- Icons CSS-->
    <link href="../../content/css/icons.css" rel="stylesheet" type="text/css"/>
    <!-- Sidebar CSS-->
    <link href="../../content/css/sidebar-menu.css" rel="stylesheet"/>
    <!-- Custom Style-->
    <link href="../../content/css/app-style.css" rel="stylesheet"/>

<body style="background-color: #fff; color: rgb(0 0 0);">

<div id="vue-gad-survey-recommendation" v-cloak>

	<!-- Start wrapper-->
	<div id="wrapper" >

		<div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
   			<div class="card-recommendation card-authentication1-recommendation mx-auto">
	   			<div class="card-body">
					<div class="card-content p-2">
						<div class="text-center">
							<!-- <img src="../../content/img/logoLatest.png" alt="logo icon"> -->
							<img src="../../content/images/logo.png" alt="logo icon" style=" display: inline-block; max-width: 10%; height: auto; border-style: none; margin-left: 5%;">
						</div>
		 				<div class="card-title-recommendation text-uppercase text-center py-3">ANTI – ANXIETY SURVEY REPORT</div>
                        
                        <div class="form-row mt-5">
                            <div class="form-group col-12">
                                <label  style="color: #000000; text-transform: none;" for="name">Name: <u>John Carlo Lopez</u></label>
                            </div>
                            <div class="form-group col-12">
                                <label  style="color: #000000; text-transform: none;" for="name">Email: <u>jclopez@my.jru.edu</u></label>
                            </div>

                            <div class="form-group col-12">
                                <label  style="color: #000000; text-transform: none;" for="name">Date Completed: <u>September 10, 2022</u></label>
                            </div>

                            <div class="form-group col-12">
                                <label  style="color: #000000; text-transform: none;" for="name">Survey Taken: <u>GAD-7</u></label>
                            </div>

                            <div class="form-group col-12">
                                <label  style="color: #000000; text-transform: none;" for="name">Survey Description: The Generalised Anxiety Disorder Assessment (GAD-7) is a seven-item instrument that is used to measure or assess the severity of generalised anxiety disorder (GAD). Each item asks the individual to rate the severity of his or her symptoms over the past two weeks.</label>
                            </div>

                            <div class="form-group col-12">
                                <label  style="color: #000000; text-transform: none;" for="name">
                                    GAD-7 Total Score Symptom Range. <br><br>
                                    0-4 Minimal Anxiety <br>
                                    5-9 Mild Anxiety <br>
                                    10-14 Moderate Anxiety <br>
                                    15-21 Severe Anxiety <br>
                                </label>
                            </div>
                        </div>

                        <div class="card-title-recommendation text-uppercase text-center py-3">RESULT</div>

                        <div v-for="(gadDetail, index) in gadDetails">
                            <p class="pb-2 mt-2"><b> {{gadDetail.Description}} </b></p>
                            <div class="form-row ml-3">
                                
                                <div class="form-group col-3">
                                    <input type="radio" :name="gadDetail.gadName" :value="gadDetail.GadChoicesOne" :checked="gadDetail.GadChoicesOne == gadDetail.Value" :disabled="gadDetail.GadChoicesOne != gadDetail.Value">
                                    <label for="gadDetail.gadName" style="color: black">{{gadDetail.GadChoicesOne + " - " + gadDetail.GadChoicesOneDescription}}</label>
                                </div>
                                <div class="form-group col-3">
                                    <input type="radio" :name="gadDetail.gadName" :value="gadDetail.GadChoicesTwo" :checked="gadDetail.GadChoicesTwo == gadDetail.Value" :disabled="gadDetail.GadChoicesTwo != gadDetail.Value">
                                    <label for="gadDetail.gadName" style="color: black">{{gadDetail.GadChoicesTwo + " - " + gadDetail.GadChoicesTwoDescription}}</label>
                                </div>
                                <div class="form-group col-3">
                                    <input type="radio" :name="gadDetail.gadName" :value="gadDetail.GadChoicesThree" :checked="gadDetail.GadChoicesThree == gadDetail.Value" :disabled="gadDetail.GadChoicesThree != gadDetail.Value">
                                    <label for="gadDetail.gadName" style="color: black">{{gadDetail.GadChoicesThree + " - " + gadDetail.GadChoicesThreeDescription}}</label>
                                </div>
                                <div class="form-group col-3">
                                    <input type="radio" :name="gadDetail.gadName" :value="gadDetail.GadChoicesFour" :checked="gadDetail.GadChoicesFour == gadDetail.Value" :disabled="gadDetail.GadChoicesFour != gadDetail.Value">
                                    <label for="gadDetail.gadName" style="color: black">{{gadDetail.GadChoicesFour + " - " + gadDetail.GadChoicesFourDescription}}</label>
                                </div>
                            </div>
                            <hr>
                        </div>

                        

                        <div class="card-title-recommendation text-uppercase text-left py-3 mt-5">Total Score (Sum of Column Scores): <u>{{totalScore}}</u></div>

                        <div class="form-row" v-if="isMinimalOrMild">
                            <!-- <div class="form-group col-12">
                                <label  style="color: #000000; text-transform: none;" for="name">(Minimal / Mild)</label>
                            </div>
                            <div class="form-group col-12">
                                <p  style="color: #000000; text-transform: none;" for="name">You may able to control mild anxiety with simple lifestyle changes. Strongly consider doing the following:</p>
                            </div>

                            <div class="form-group col-12">
                                <ul>
                                    <li>
                                        Exercise Regularly - Exercise releases endorphins which calm your 
                                        entire body. It uses up adrenaline that is released when you are 
                                        anxious and potentially burns away stress hormones. It tires out 
                                        muscles to reduce your anxiety symptoms, and it reduces general 
                                        physical stress, which studies have shown can decrease mental 
                                        stress as well.
                                    </li>
                                    <li>
                                        Sleep, Diet, etc. - Getting enough sleep and eating healthier 
                                        drastically reduce physical and mental stress, and can make coping
                                        with anxiety much easier.
                                    </li>
                                    <li>
                                        Relaxation Strategies - Try deep breathing, visualization, and progressive
                                        muscle relaxation to start. Make sure you commit to them for at minimum two
                                        months. Contrary to popular belief, relaxation exercises do not work right
                                        away. They only work when you become used to doing them without overthinking
                                        the behaviors.
                                    </li>
                                </ul>
                            </div> -->
                        </div>

                        <div class="form-row" v-else>
                            <div class="form-group col-12">
                                <label  style="color: #000000; text-transform: none;" for="name">Recommendation for Moderate to Severe anxiety :</label>
                            </div>
                            <div class="form-group col-12">
                                <p  style="color: #000000; text-transform: none;" for="name">Please Consult a Psychologist.</p>
                            </div>
                        </div>
						
		  			</div>
		 		</div>
			</div>
  		</div> 
   
   	</div><!--wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="../../content/js/jquery.min.js"></script>
  <script src="../../content/js/popper.min.js"></script>
  <script src="../../content/js/bootstrap.min.js"></script>
  <!-- <script src="../../content/js/bootstrap5.min.js"></script> -->
  
  <!-- jquery datatable -->
  <script src="../../content/js/jquery_datatable.min.js"></script>
	
 <!-- simplebar js -->
  <script src="../../content/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="../../content/js/sidebar-menu.js"></script>

  <!-- loader scripts -->
  <!-- <script src="../../content/js/jquery.loading-indicator.js"></script> -->

  <!-- Custom scripts -->
  <script src="../../content/js/app-script.js"></script>

  <!-- Chart js -->
  <script src="../../content/plugins/Chart.js/Chart.min.js"></script>
 
  <!-- Index js -->
  <!-- <script src="../../content/js/index.js"></script> -->



  <!-- sweet alert -->
  <script src="../../content/js/sweet_alert2.js"></script>


  <!-- axios -->
  <script src="../../content/js/axios.min.js"></script>

  <!-- vue -->
  <script src="../../content/js/vue.js"></script>

  <!-- dashboard -->
  <script src="../../content/js/application/psychiatrist/gad/gad_survey_recommendation.js"></script>
</div>
    
</body>
</html>