<?php require_once '../../../private/initialize.php'; ?>
<?php $active_page = 'User' ?>
<?php $title_page = 'User Details' ?>
<?php include(SHARED_PATH . '/admin_header.php') ?>

<div class="content-wrapper" id="vue-user-details">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="uploadImage">
                    <div v-else>
                        <p class="pb-2">Fill out the form carefully.</p>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <div class="file-upload-content">
                                <img class="file-upload-image" :src="image" alt="loading image" />
                            </div>
                        </div>
                    </div>

                    <!-- First Name & Middle Name -->
                    <div class="form-row">
                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <input type="text" class="form-control input-shadow" placeholder="Enter First Name" v-model="firstName" disabled>
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <input type="text" class="form-control input-shadow" placeholder="Enter Middle Name" v-model="middleName" disabled>
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / First Name & Middle Name -->
                    <!-- Last Name & Birth Date -->
                    <div class="form-row">
                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <input type="text" class="form-control input-shadow" placeholder="Enter Last Name" v-model="lastName" disabled>
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="position-relative">
                                <input type="date" class="form-control input-shadow" v-model="birthDate" disabled>
                                <!-- <div class="form-control-position">
                                    <i class="icon-calendar"></i>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- / Last Name & Birth Date -->
                    <!-- Email Address & Mobile Number -->
                    <div class="form-row">
                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <input type="text" class="form-control input-shadow" placeholder="Enter Email Address" v-model="emailAddress" disabled>
                                <div class="form-control-position">
                                    <i class="icon-envelope"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <input 
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                                type="number" maxlength="11" pattern="\d" class="form-control input-shadow" placeholder="Enter Mobile Number" v-model="mobileNumber" disabled>
                                <div class="form-control-position">
                                    <i class="icon-phone"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Email Address & Mobile Number -->

                    <!-- User Type & address -->
                    <div class="form-row">
                        
                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <select class="form-control input-shadow" v-model="userTypeId" disabled>
                                    <option disabled value="0">Select user type</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Psychiatrist</option>
                                    <option value="3">Student</option>
                                </select>
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <input type="text" class="form-control input-shadow" placeholder="Enter Id Number" v-model="idNumber" disabled>
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / User Type & address -->

                    <!-- Department & Course -->
                    <div class="form-row">
                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <select class="form-control input-shadow" v-model="departmentId" disabled>
                                    <option disabled value="0">Select department</option>
                                    <option v-for="department in departments" :value="department.DepartmentId">{{department.Description}}</option>
                                </select>
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <select class="form-control input-shadow" v-model="courseId" disabled>
                                    <option disabled value="0">Select course</option>
                                    <option v-for="course in courses" :value="course.CourseId">{{course.Description}}</option>
                                </select>
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Department & Course  -->

                    <!-- Year & Street -->
                    <div class="form-row">
                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <select class="form-control input-shadow" v-model="yearId" disabled>
                                    <option disabled value="0">Select year</option>
                                    <option v-for="year in years" :value="year.YearId">{{year.Description}}</option>
                                </select>
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <input type="text" class="form-control input-shadow" placeholder="Enter Street" v-model="street" disabled>
                                <div class="form-control-position">
                                    <i class="icon-location-pin"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Year & Street  -->

                    <!-- Barangay & City -->
                    <div class="form-row">
                        
                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <input type="text" class="form-control input-shadow" placeholder="Enter Barangay" v-model="barangay" disabled>
                                <div class="form-control-position">
                                    <i class="icon-location-pin"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <input type="text" class="form-control input-shadow" placeholder="Enter City" v-model="city" disabled>
                                <div class="form-control-position">
                                    <i class="icon-location-pin"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Barangay & City  -->

                    <button @click="redirectToMain" class="btn btn-light float-right ml-3">Back to Previous</button>
                </form>
            </div>
        </div>




	    <!--start overlay-->
        <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
</div><!--End content-wrapper-->

<?php include(SHARED_PATH . '/admin/user/user_details_footer.php') ?>