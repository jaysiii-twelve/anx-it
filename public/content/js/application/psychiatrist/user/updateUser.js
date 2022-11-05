var vm = new Vue({
    el : "#vue-update-user",
    data : {
        url_root : "/public/controller/admin/user/",

        userId: '',
        firstName : '',
        middleName : '',
        lastName : '',
        birthDate : '',
        emailAddress : '',
        mobileNumber: '',
        address: '',
        password : '',
        image: '',
        userTypeId: 0,
        idNumber : '',
        departmentId: 0,
        courseId : 0,
        yearId : 0,
        street : '',
        barangay : '',
        city : '',

        file: '',

		errors : [],
        users : [],
        departments: [],
        courses: [],
        years: [],
    },
    methods : {
        retrieveAllUser : function() {
            axios.get(this.url_root + 'retrieve_all_user.php')
			.then(function(response) {
				console.log(response);
				vm.users = response.data;
			});
        },
        retrieveDepartment : function() {
            axios.get(this.url_root + 'retrieve_department.php')
			.then(function(response) {
				console.log(response);
				vm.departments = response.data;
			});
        },

        retrieveCourse : function() {
            axios.get(this.url_root + 'retrieve_course.php')
			.then(function(response) {
				console.log(response);
				vm.courses = response.data;
			});
        },

        retrieveYear : function() {
            axios.get(this.url_root + 'retrieve_year.php')
			.then(function(response) {
				console.log(response);
				vm.years = response.data;
			});
        },
        retrieveUser : function() {
            axios.get(this.url_root + 'retrieve_user_by_user_id.php?userId='+ window.sessionStorage.getItem("userId"))
			.then(function(response) {

                vm.userId = response.data[0].UserId;
                vm.firstName = response.data[0].FirstName;
                vm.middleName = response.data[0].MiddleName;
                vm.lastName = response.data[0].LastName;
                vm.birthDate = response.data[0].BirthDate;
                vm.emailAddress = response.data[0].EmailAddress;
                vm.mobileNumber = response.data[0].MobileNumber;
                vm.address = response.data[0].Address;
                vm.image = "../../content/images/uploadedImage/" +response.data[0].ImageName;
                vm.userTypeId = response.data[0].UserTypeId;
                vm.idNumber = response.data[0].IdNumber;
                vm.departmentId = response.data[0].DepartmentId;
                vm.courseId = response.data[0].CourseId;
                vm.yearId = response.data[0].YearId;
                vm.street = response.data[0].Street;
                vm.barangay = response.data[0].Barangay;
                vm.city = response.data[0].City;
			});
        },
        updateUser : function() {
            
            axios.post(this.url_root + "update_user.php", {
                userId : this.userId,
                firstName : this.firstName,
                middleName : this.middleName,
                lastName : this.lastName,
                birthDate : this.birthDate,
                emailAddress : this.emailAddress,
                mobileNumber : this.mobileNumber,
                imageName : this.file == "" ? this.image : this.file['name'],
                userTypeId : this.userTypeId,
                idNumber : this.idNumber,
                departmentId : this.departmentId,
                courseId : this.courseId,
                yearId : this.yearId,
                street : this.street,
                barangay : this.barangay,
                city : this.city,
            }).then((response) => {
                console.log(response);
                setTimeout(() => {
                    $(".pace").removeClass("pace-active");
                    $(".pace").addClass("pace-inactive");
                    Swal.fire({
                        title : 'Update status',
                        text : 'User updated successfully',
                        icon : 'success',
                        allowOutsideClick: false,
                        timer : 3000,
                        showConfirmButton : false
                    }).then(() => {
                        window.location = "https://anx-it.herokuapp.com/public/views/psychiatrist/dashboard.php";
                    });
                }, 3000);
            })
            
            
        },

        triggerFile : function(e) {
            e.preventDefault();
            $('.file-upload-input').trigger( 'click' );
        },

        readURL : function(event) {
			var files = event.target.files || event.dataTransfer.files;

			if(!files.length) {
				return;
			}

			this.createImage(files[0]);
			this.file = this.$refs.file.files[0];
            this.image = this.file['name'];

		},
        createImage : function(file) {
			var image = new Image();
			var reader = new FileReader();

			reader.onload = (e) => {
				vm.image = e.target.result;
			};

			reader.readAsDataURL(file);
		},
		removeImage : function(e) {
            e.preventDefault();
			this.image = '';
			this.file = '';
		},
		uploadImage : function() {
			var formData = new FormData();
			formData.append('file', vm.file);

            this.errors = [];
			if(this.firstName.trim() == '') {
				this.errors.push('First Name is required!');
			}

			if(this.lastName.trim() == '') {
				this.errors.push('Last Name is required!');
            }

            if(this.birthDate.trim() == '') {
				this.errors.push('Birth Date is required!');
            }

            if(this.emailAddress.trim() == '') {
				this.errors.push('Email Addresss is required!');
            }
            else {
                if(!this.emailAddress.includes("@my.jru.edu")) {
                    this.errors.push('Invalid Email Address!');
                }
            }

            if(this.mobileNumber.trim() == '') {
                this.errors.push('Mobile Number is required!');
            }

            if(this.image.trim() == '') {
				this.errors.push('Image is required!');
			}

            if(this.userTypeId == 0) {
                this.errors.push('User Type is required!');
            }

            if(this.idNumber.trim() == '') {
				this.errors.push('ID Number is required!');
			}

            if(this.departmentId == 0) {
				this.errors.push('Department is required!');
			}

            if(this.courseId == 0) {
				this.errors.push('Course is required!');
			}

            if(this.yearId == 0) {
				this.errors.push('Year is required!');
			}

            if(this.street.trim() == '') {
				this.errors.push('Street is required!');
			}

            if(this.barangay.trim() == '') {
				this.errors.push('Barangay is required!');
			}

            if(this.city.trim() == '') {
				this.errors.push('City is required!');
			}
            
            if(this.validateIdNumber(this.idNumber)) {
                this.errors.push('Id Number already exist!');
            }

            if(this.errors.length == 0) {
                if(this.file != "") {
                    axios.post(vm.url_root + "upload_file.php", formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }).then(function(response) {
                        vm.errors = [];
                        var isUploaded = response.data[0].status == 5 ? true : false;
        
                        if(isUploaded) {
                            $(".pace").removeClass("pace-inactive");
                            $(".pace").addClass("pace-active");
                            vm.updateUser();
                        }
                        else {
                            vm.errors.push(response.data[0].message);
                        }
                    });
                }
                else {
                    $(".pace").removeClass("pace-inactive");
                    $(".pace").addClass("pace-active");
                    this.image = this.image.replace("../../content/images/uploadedImage/", "");
                    this.updateUser();
                }
               
            }
		},

        redirectToMain: function(e) {
            e.preventDefault();

			Swal.fire({
				title: 'Continue?',
				text: "Are you sure you want to go to main page ?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes',
				allowOutsideClick: false
			  }).then((result) => {
				if(result.value) {
					window.location = "https://anx-it.herokuapp.com/public/views/psychiatrist/dashboard.php";
				}
			})
        },

        validateIdNumber : function(idNumber) {
            var found = false;
            for(var index = 0; index < this.users.length; index++) {
                if(this.users[index].UserId != this.userId) {
                    if(this.users[index].IdNumber == idNumber) {
                        found = true;
                    }
                }
                
            }

            return found;
        }
    },
    computed : {
		changeTitle : function() {
			if(this.file == '') {
				return 'Drag and Drop a file or Click Add Image';
			}
			else {
				return '';
			}
		},
	},
    created() {
        this.retrieveUser();
        this.retrieveAllUser();
        this.retrieveDepartment();
        this.retrieveCourse();
        this.retrieveYear();
    }
})