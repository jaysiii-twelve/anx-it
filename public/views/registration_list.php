<?php require_once '../../private/initialize.php'; ?>
<?php include(SHARED_PATH . '/registrationList/registration_list_header.php') ?>

<div id="vue-registration-list" v-cloak>

	<!-- Start wrapper-->
	<div id="wrapper" >

		<div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
   			<div class="card card-authentication1-register mx-auto my-5">
	   			<div class="card-body">
					<div class="card-content p-2">
						<h5 class="card-title">List of Registered User</h5>
						

						<user-management-datatable
                    	:users="users"></user-management-datatable>
		  			</div>
		 		</div>
		 		<div class="card-footer text-center py-3">
		   			<p class="text-warning mb-0">Already have an account? <a href="login.php"> Sign In here</a></p>
		 		</div>
			</div>
   
			<!--Start Back To Top Button-->
			<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
			<!--End Back To Top Button-->
   
   			<!--start color switcher-->
  			<!-- <div class="right-sidebar">
				<div class="switcher-icon">
					<i class="zmdi zmdi-settings zmdi-hc-spin"></i>
				</div>
   				<div class="right-sidebar-content">

				<p class="mb-0">Gaussion Texture

				</p>
	 			<hr>
	 
				<ul class="switcher">
				<li id="theme1"></li>
				<li id="theme2"></li>
				<li id="theme3"></li>
				<li id="theme4"></li>
				<li id="theme5"></li>
				<li id="theme6"></li>
				</ul>

				<p class="mb-0">Gradient Background</p>
				<hr>
	 
				<ul class="switcher">
				<li id="theme7"></li>
				<li id="theme8"></li>
				<li id="theme9"></li>
				<li id="theme10"></li>
				<li id="theme11"></li>
				<li id="theme12"></li>
				<li id="theme13"></li>
				<li id="theme14"></li>
				<li id="theme15"></li>
				</ul>
	 
			</div> -->
 			<!--end color switcher -->

  		</div> 
   
   	</div><!--wrapper-->

</div>
<?php include(SHARED_PATH . '/registrationList/registration_list_footer.php') ?>