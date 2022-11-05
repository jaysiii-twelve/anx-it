<?php require_once '../../private/initialize.php'; ?>
<?php include(SHARED_PATH . '/accountAccess/account_access_header.php') ?>

<div id="vue-account-access" v-cloak>

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
						<form @submit.prevent="verifyEmail">
							<div v-if="errors.length > 0" >
								<!-- <div  class="card-title text-uppercase pb-2" >Please correct the following error(s):</div> -->
								<ul style="margin-left : 30px; list-style-type : circle">
									<li v-for="error in errors">{{ error }}</li>
								</ul>
							</div>

							<div v-else>
								<p class="pb-2">Please enter your email address. The system will verify the account access status.</p>
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
<?php include(SHARED_PATH . '/accountAccess/account_access_footer.php') ?>