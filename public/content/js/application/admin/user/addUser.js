var vm = new Vue({
    el : "#vue-add-user",
    data : {
        url_root : "/AAA/public/controller/admin/user/",

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

        file: '',

		errors : [],

        showPassword: false,
        isRegister: false

    },
    methods : {
        registerUser : function() {
            
            axios.post(this.url_root + "add_user.php", {
                firstName : this.firstName,
                middleName : this.middleName,
                lastName : this.lastName,
                birthDate : this.birthDate,
                emailAddress : this.emailAddress,
                mobileNumber : this.mobileNumber,
                address : this.address,
                password : this.password,
                imageName : this.file['name'],
                userTypeId : this.userTypeId
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
                        window.location = "http://localhost:8080/AAA/public/views/admin/user.php";
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

            if(this.address.trim() == '') {
                this.errors.push('Address is required!');
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
					window.location = "http://localhost:8080/AAA/public/views/gad_7.php";
				}
			})
        },
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
})