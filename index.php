<?php require_once 'private/initialize.php'; ?>
<?php include(SHARED_PATH . '/login/login_header.php') ?>

<div id="vue-login" v-cloak>

	<!-- Start wrapper-->
	<div id="wrapper" >

		<div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
   			<div class="card card-authentication1 mx-auto my-5">
	   			<div class="card-body">
					<div class="card-content p-2">
						<div class="text-center">
							<!-- <img src="../content/img/logoLatest.png" alt="logo icon"> -->
							<img src="public/content/images/logo.png" alt="logo icon" style=" display: inline-block; max-width: 20%; height: auto; border-style: none; margin-left: 5%;">
						</div>
		 				<div class="card-title text-uppercase text-center py-3">ANTI - ANXIETY APP</div>
						 <hr>
						<form @submit.prevent="loginUser">
							<div v-if="errors.length > 0" >
								<ul style="margin-left : 30px; list-style-type : circle">
									<li v-for="error in errors">{{ error }}</li>
								</ul>
							</div>
							<div class="form-group">
								<div class="position-relative has-icon-right">
									<input type="text" class="form-control input-shadow" placeholder="Enter Email Address" v-model="emailAddress">
									<div class="form-control-position">
										<i class="icon-envelope"></i>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="position-relative has-icon-right">
									<input v-if="!showPassword" type="password" class="form-control input-shadow" placeholder="Enter Password" v-model="password">
									<input v-else type="text" class="form-control input-shadow" placeholder="Enter Password" v-model="password">
									<div class="form-control-position" >
										<i v-if="!showPassword" class="icon-lock"></i>
										<i v-else class="icon-lock-open"></i>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-6">
									<div class="icheck-material-white">
										<input type="checkbox" id="user-checkbox" v-model="showPassword"/>
										<label for="user-checkbox">Show Password</label>
									</div>
								</div>
								<div class="form-group col-6 text-right">
									<a href="public/views/resetPassword.php">Reset Password</a>
								</div>
							</div>
							<button type="submit" class="btn btn-light btn-block">Sign In</button>
						</form>
		  			</div>
		 		</div>
		 		<div class="card-footer text-center py-3">
		   			<p class="text-warning mb-0">Do not have an account? <a href="public/views/register.php"> <u>Sign Up here</u></a></p>
		 		</div>
				 <div class="card-footer text-center py-3">
		   			<p class="text-warning mb-0">Can't login? <a href="public/views/account_access.php"> <u>Check your access status here</u></a></p>
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
<?php include(SHARED_PATH . '/login/login_footer.php') ?>