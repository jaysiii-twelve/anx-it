var vm = new Vue({
    el : "#vue-register",
    data : {
        url_root : "/public/controller/register/",

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

        showPassword: false,
        isRegister: false

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
        registerUser : function() {
            
            axios.post(this.url_root + "add_user.php", {
                firstName : this.firstName,
                middleName : this.middleName,
                lastName : this.lastName,
                birthDate : this.birthDate,
                emailAddress : this.emailAddress,
                mobileNumber : this.mobileNumber,
                password : this.password,
                imageName : this.file['name'],
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
                        title : 'Add status',
                        text : 'User added successfully',
                        icon : 'success',
                        allowOutsideClick: false,
                        timer : 3000,
                        showConfirmButton : false
                    }).then(() => {
                        vm.is_added = false;
                        window.location = "https://anx-it.herokuapp.com/public/views/login.php";
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

            if(this.password.trim() == '') {
				this.errors.push('Password is required!');
            }
            
            if(this.password.length < 6) {
                this.errors.push('Password must be at least 6 characters!');
            }

            if(!this.password.match(/[A-z]/)) {
                this.errors.push('Password should have at least 1 small letter!');
            }

            if(!this.password.match(/[A-Z]/)) {
                this.errors.push('Password should have at least 1 capital letter!');
            }

            if(!this.password.match(/\d/)) {
                this.errors.push('Password should have at least 1 number!');
            }

            if(!this.password.match(/^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]+$/g)) {
                this.errors.push('Password should have at least 1 symbol!');
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
                this.isRegister = true;
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
                        vm.registerUser();
                    }
                    else {
                        vm.errors.push(response.data[0].message);
                        vm.isRegister = false;
                    }
                    console.log(response);
                });
            }
		},
        validateIdNumber : function(idNumber) {
            var found = false;
            for(var index = 0; index < this.users.length; index++) {
                if(this.users[index].IdNumber == idNumber) {
                    found = true;
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
        this.retrieveAllUser();
        this.retrieveDepartment();
        this.retrieveCourse();
        this.retrieveYear();
    }
})