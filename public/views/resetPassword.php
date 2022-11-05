<?php require_once '../../private/initialize.php'; ?>
<?php include(SHARED_PATH . '/resetPassword/reset_password_header.php') ?>

<div id="vue-reset-password" v-cloak>

	<!-- Start wrapper-->
	<div id="wrapper" >

		<div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
   			<div class="card card-authentication1 mx-auto my-5">
	   			<div class="card-body">
					<div class="card-content p-2">
						<div class="text-center">
							<!-- <img src="../content/img/logoLatest.png" alt="logo icon"> -->
							<img src="../content/images/logo.png" alt="logo icon" style=" display: inline-block; max-width: 20%; height: auto; border-style: none; margin-left: 5%;">
						</div>
		 				<div class="card-title text-uppercase text-center py-3">ANTI - ANXIETY APP</div>
						<hr>
						<form v-if="!isVerify" @submit.prevent="verifyEmail">
							<div class="card-title text-uppercase pb-2">Forgot Password</div>
							<div v-if="errors.length > 0" >
								<!-- <div  class="card-title text-uppercase pb-2" >Please correct the following error(s):</div> -->
								<ul style="margin-left : 30px; list-style-type : circle">
									<li v-for="error in errors">{{ error }}</li>
								</ul>
							</div>

							<div v-else>
								<p class="pb-2">Please enter your email address. The system will verify if the email exist.</p>
							</div>
							
							<div class="form-group">
			  					<label for="emailAddress" class="">Email Address</label>
								<div class="position-relative has-icon-right">
									<input type="text" class="form-control input-shadow" placeholder="Email Address" v-model="emailAddress">
									<div class="form-control-position">
										<i class="icon-envelope"></i>
									</div>
								</div>
			  				</div>

							<button type="submit" class="btn btn-light btn-block mt-3">Verify Email</button>
						</form>

						<form v-if="isVerify" @submit.prevent="resetPassword">
							<div class="card-title text-uppercase pb-2">Forgot Password</div>
							<div v-if="errors.length > 0" >
								<!-- <div  class="card-title text-uppercase pb-2" >Please correct the following error(s):</div> -->
								<ul style="margin-left : 30px; list-style-type : circle">
									<li v-for="error in errors">{{ error }}</li>
								</ul>
							</div>

							<div v-else>
								<p class="pb-2">Please enter your new password.</p>
							</div>
							
							<div class="form-group">
			  					<label for="password" class="">Password</label>
								<div class="position-relative has-icon-right">
									<input v-if="!showPassword" type="password" class="form-control input-shadow" placeholder="Enter Password" v-model="password">
									<input v-else type="text" class="form-control input-shadow" placeholder="Enter Password" v-model="password">
									<div class="form-control-position" >
										<i v-if="!showPassword" class="icon-lock"></i>
										<i v-else class="icon-lock-open"></i>
									</div>
								</div>
			  				</div>

							<div class="form-group">
								<div class="icheck-material-white">
									<input type="checkbox" id="user-checkbox" v-model="showPassword"/>
									<label for="user-checkbox">Show Password</label>
								</div>
			  				</div>

							<button type="submit" class="btn btn-light btn-block mt-3">Reset Password</button>
						</form>
		  			</div>
		 		</div>
		 		<div class="card-footer text-center py-3">
		   			<p class="text-warning mb-0">Return to the <a href="../../index.php"> Sign In</a></p>
		 		</div>
			</div>
   
			<!--Start Back To Top Button-->
			<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
			<!--End Back To Top Button-->
   
  		</div> 
   
   	</div><!--wrapper-->

</div>
<?php include(SHARED_PATH . '/resetPassword/reset_password_footer.php') ?>