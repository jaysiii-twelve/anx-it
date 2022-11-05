<?php require_once '../../../private/initialize.php'; ?>
<?php $active_page = 'User' ?>
<?php $title_page = 'Add User' ?>
<?php include(SHARED_PATH . '/admin_header.php') ?>

<div class="content-wrapper" id="vue-add-user">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="uploadImage">
                    <div v-if="errors.length > 0" >
                        <!-- <div  class="card-title text-uppercase pb-2" >Please correct the following error(s):</div> -->
                        <ul style="margin-left : 30px; list-style-type : circle">
                            <li v-for="error in errors">{{ error }}</li>
                        </ul>
                    </div>

                    <div v-else>
                        <p class="pb-2">Fill out the form carefully.</p>
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
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <input type="text" class="form-control input-shadow" placeholder="Enter Middle Name" v-model="middleName">
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
                                <input type="text" class="form-control input-shadow" placeholder="Enter Last Name" v-model="lastName">
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="position-relative">
                                <input type="date" class="form-control input-shadow" v-model="birthDate">
                                <!-- <div class="form-control-position">
                                    <i class="icon-calendar"></i>
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
                                    <i class="icon-envelope"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <input type="password" class="form-control input-shadow" placeholder="Enter Password" v-model="password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Last Name & Birth Date -->

                    <!-- Mobile Number & address -->
                    <div class="form-row">
                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <input 
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                                type="number" maxlength="11" pattern="\d" class="form-control input-shadow" placeholder="Enter Mobile Number" v-model="mobileNumber">
                                <div class="form-control-position">
                                    <i class="icon-phone"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <select class="form-control input-shadow" v-model="userTypeId">
                                    <option disabled value="0">Select user type</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Teacher</option>
                                    <option value="3">Student</option>
                                </select>
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Mobile Number & address -->

                    <!-- Mobile Number & address -->
                    <div class="form-row">
                        
                        <div class="form-group col-6">
                            <div class="position-relative has-icon-right">
                                <textarea class="form-control input-shadow" placeholder="Enter address" v-model="address"  cols="30" rows="1"></textarea>
                                <div class="form-control-position">
                                    <i class="icon-location-pin"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Mobile Number & address -->

                    <button @click="redirectToMain" class="btn btn-light float-right ml-3">Back to Previous</button>
                    <button type="submit" class="btn btn-light float-right">Save</button>
                </form>
            </div>
        </div>




	    <!--start overlay-->
        <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
</div><!--End content-wrapper-->

<?php include(SHARED_PATH . '/admin/user/add_user_footer.php') ?>