<?php require_once '../../private/initialize.php'; ?>
<?php include(SHARED_PATH . '/register/register_header.php') ?>

<div id="vue-register" v-cloak>

	<!-- Start wrapper-->
	<div id="wrapper" >

		<div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
   			<div class="card card-authentication1-register mx-auto my-5">
	   			<div class="card-body">
					<div class="card-content p-2">
						<div class="text-center">
							<!-- <img src="../content/img/logoLatest.png" alt="logo icon"> -->
							<img src="../content/images/logo.png" alt="logo icon" style=" display: inline-block; max-width: 20%; height: auto; border-style: none; margin-left: 5%;">
						</div>
		 				<div class="card-title text-uppercase text-center py-3">ANTI - ANXIETY APP</div>
						 <hr>
						<form @submit.prevent="uploadImage">
							<div v-if="errors.length > 0" >
								<!-- <div  class="card-title text-uppercase pb-2" >Please correct the following error(s):</div> -->
								<ul style="margin-left : 30px; list-style-type : circle">
									<li v-for="error in errors">{{ error }}</li>
								</ul>
							</div>

							<div v-else>
								<p class="pb-2">Fill out the form carefully for registration.</p>
							</div>

							<div class="form-row">
								<div class="form-group col-12">
									<button @click="triggerFile" class="btn btn-light btn-block">Add Image</button>

									<div class="image-upload-wrap" v-if="image == ''">
										<input @change="readURL" class="file-upload-input" type="file" accept="image/*" ref="file" />
										<div class="drag-text">
											<p class="pb-2">{{changeTitle}}</p>
										</div>
									</div>

									<div class="file-upload-content" v-else>
										<img class="file-upload-image" :src="image" alt="your image" />

										<button @click="removeImage" class="btn btn-remove-image btn-block">Remove Uploaded Image</button>
									</div>
								</div>
							</div>

							<!-- First Name & Middle Name -->
							<div class="form-row">
								<div class="form-group col-6">
									<div class="position-relative has-icon-right">
										<input type="text" class="form-control input-shadow" placeholder="Enter First Name" v-model="firstName">
										<div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div>
									</div>
								</div>
								<div class="form-group col-6">
									<div class="position-relative has-icon-right">
										<input type="text" class="form-control input-shadow" placeholder="Enter Middle Name" v-model="middleName">
										<div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div>
									</div>
								</div>
							</div>
							<!-- / First Name & Middle Name -->
							<!-- Last Name & Birth Date -->
							<div class="form-row">
								<div class="form-group col-6">
									<div class="position-relative has-icon-right">
										<input type="text" class="form-control input-shadow" placeholder="Enter Last Name" v-model="lastName">
										<div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div>
									</div>
								</div>
								<div class="form-group col-6">
									<div class="position-relative">
										<input type="date" class="form-control input-shadow" v-model="birthDate">
										<!-- <div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div> -->
									</div>
								</div>
							</div>
							<!-- / Last Name & Birth Date -->
							<!-- Email Address & Password -->
							<div class="form-row">
								<div class="form-group col-6">
									<div class="position-relative has-icon-right">
										<input type="text" class="form-control input-shadow" placeholder="Enter Email Address" v-model="emailAddress">
										<div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div>
									</div>
								</div>
								<div class="form-group col-6">
									<div class="position-relative has-icon-right">
										<input type="password" class="form-control input-shadow" placeholder="Enter Password" v-model="password">
										<div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div>
									</div>
								</div>
							</div>
							<!-- / Last Name & Birth Date -->

							<!-- Mobile Number & User Type -->
							<div class="form-row">
								<div class="form-group col-6">
									<div class="position-relative has-icon-right">
										<input 
										oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
										type="number" maxlength="11" pattern="\d" class="form-control input-shadow" placeholder="Enter Mobile Number" v-model="mobileNumber">
										<div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div>
									</div>
								</div>
								<div class="form-group col-6">
									<div class="position-relative has-icon-right">
										<select class="form-control input-shadow" v-model="userTypeId">
											<option disabled value="0">Select user type</option>
											<option value="1">Admin</option>
											<option value="2">Psychiatrist</option>
											<option value="3">Student</option>
										</select>
										<div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div>
									</div>
								</div>
							</div>
							<!-- / Mobile Number & User Type -->

							<!-- Id Number & Department -->
							<div class="form-row">
								<div class="form-group col-6">
									<div class="position-relative has-icon-right">
										<input type="text" class="form-control input-shadow" placeholder="Enter Id Number" v-model="idNumber">
										<div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div>
									</div>
								</div>
								<div class="form-group col-6">
									<div class="position-relative has-icon-right">
										<select class="form-control input-shadow" v-model="departmentId">
											<option disabled value="0">Select department</option>
											<option v-for="department in departments" :value="department.DepartmentId">{{department.Description}}</option>
										</select>
										<div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div>
									</div>
								</div>
							</div>
							<!-- / Id Number & Department  -->

							<!-- Course & Year -->
							<div class="form-row">
								<div class="form-group col-6">
									<div class="position-relative has-icon-right">
										<select class="form-control input-shadow" v-model="courseId" >
											<option disabled value="0">Select course</option>
											<option v-for="course in courses" :value="course.CourseId">{{course.Description}}</option>
										</select>
										<div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div>
									</div>
								</div>
								<div class="form-group col-6">
									<div class="position-relative has-icon-right">
										<select class="form-control input-shadow" v-model="yearId" >
											<option disabled value="0">Select year</option>
											<option v-for="year in years" :value="year.YearId">{{year.Description}}</option>
										</select>
										<div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div>
									</div>
								</div>
							</div>
							<!-- / Course & Year  -->

							<!-- Street & Barangay -->
							<div class="form-row">
								<div class="form-group col-6">
									<div class="position-relative has-icon-right">
										<input type="text" class="form-control input-shadow" placeholder="Enter Street" v-model="street">
										<div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div>
									</div>
								</div>
								<div class="form-group col-6">
									<div class="position-relative has-icon-right">
										<input type="text" class="form-control input-shadow" placeholder="Enter Barangay" v-model="barangay">
										<div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div>
									</div>
								</div>
							</div>
							<!-- / Street & Barangay  -->

							<!-- City -->
							<div class="form-row">
								<div class="form-group col-6">
									<div class="position-relative has-icon-right">
										<input type="text" class="form-control input-shadow" placeholder="Enter City" v-model="city">
										<div class="form-control-position">
											<i style="color: darkred;" class="icon-exclamation"></i>
										</div>
									</div>
								</div>
							</div>
							<!-- / City  -->

							<button type="submit" class="btn btn-light btn-block">Sign Up</button>
						</form>
		  			</div>
		 		</div>
		 		<div class="card-footer text-center py-3">
		   			<p class="text-warning mb-0">Already have an account? <a href="../../index.php"> Sign In here</a></p>
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
<?php include(SHARED_PATH . '/register/register_footer.php') ?>