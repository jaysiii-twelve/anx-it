var vm = new Vue({
    el : "#vue-login",
    data : {
        url_root : "/public/controller/login/",

        emailAddress : '',
        password : '',

		errors : [],
		error_title : '',

		error_design : {
			padding : '20px 20px 20px 20px',
			color : '#d41616'
		},

        showPassword : false

    },
    methods : {
        loginUser : function() {
            this.errors = [];
			if(this.emailAddress.trim() == '') {
				this.errors.push('Email Address is required!');
			}

			if(this.password.trim() == '') {
				this.errors.push('Password is required!');
            }
            
            if(this.errors.length == 0) {
                axios.post(this.url_root + "login.php", {
                    emailAddress : this.emailAddress,
                    password : this.password
                }).then((response) => {
                    $(".pace").removeClass("pace-inactive");
                    $(".pace").addClass("pace-active");
                    setTimeout(() => {
                        vm.errors = [];
                        vm.userAccessPage(response);

                    }, 3000);
                })
            }

        },

        userAccessPage : function(response) {
            if(response.data == '') {
                $(".pace").removeClass("pace-active");
                $(".pace").addClass("pace-inactive");
				this.errors.push('Please check your Email Address!');
            }

			if(response.data.message == 'incorrect_password') {
                $(".pace").removeClass("pace-active");
                $(".pace").addClass("pace-inactive");
				this.errors.push('Please check your password!');
            }

            if(response.data.message == 'account_pending_approval') {
                $(".pace").removeClass("pace-active");
                $(".pace").addClass("pace-inactive");
				this.errors.push('Cannot login, access account is for approval!');
            }

            if(response.data.message == 'account_rejected') {
                $(".pace").removeClass("pace-active");
                $(".pace").addClass("pace-inactive");
				this.errors.push('Cannot login, access account is rejected!');
            }

            if(this.errors.length == 0) {
                if(response.data.userTypeId == 1 || response.data.userTypeId == 4) {
                    window.location = "https://anx-it.herokuapp.com/public/views/admin/dashboard.php";
                }

                if (response.data.userTypeId == 2) {
                    window.location = "https://anx-it.herokuapp.com/public/views/psychiatrist/dashboard.php";
                }

                if(response.data.userTypeId == 3) {
                    window.location = "https://anx-it.herokuapp.com/public/views/dashboard.php";
                }
            }
            
        },

        // redirect methods
        redirectToRegistrationForm : function() {
            window.location = "https://anx-it.herokuapp.com/public/views/registration.php";
        }

    },
})
