var vm = new Vue({
    el : "#vue-reset-password",
    data : {
        url_root : "/AAA/public/controller/resetPassword/",

        emailAddress : '',
        password : '',
		errors : [],
		error_title : '',

		error_design : {
			backgroundColor : 'antiquewhite',
			padding : '20px 20px 20px 20px',
			color : '#d41616'
		},

        showPassword: false,
        isVerify: false,
        userId: 0

    },
    methods : {
        verifyEmail : function() {
            this.errors = [];
			
            if(this.emailAddress.trim() == '') {
				this.errors.push('Email Addresss is required!');
            }
            
            if(this.errors.length == 0) {
                axios.post(this.url_root + "verify_email.php", {
                    emailAddress : this.emailAddress
                }).then((response) => {
                    $(".pace").removeClass("pace-inactive");
                    $(".pace").addClass("pace-active");
                    if(response.data.isFound) 
                    {
                        setTimeout(() => {
                            $(".pace").removeClass("pace-active");
                            $(".pace").addClass("pace-inactive");
                            vm.isVerify = true;
                            vm.userId = response.data.userId
                        }, 3000);
                    }
                    else {
                        setTimeout(() => {
                            $(".pace").removeClass("pace-active");
                            $(".pace").addClass("pace-inactive");
                            vm.isVerify = false;
                            vm.errors.push("Email does not exist.")
                        }, 3000);
                    }
                })
            }
        },
        resetPassword : function() {
            this.errors = [];
			

            if(this.password.trim() == '') {
				this.errors.push('password is required!');
            }
            
            if(this.errors.length == 0) {
                axios.post(this.url_root + "reset_password.php", {
                    password : this.password,
                    user_id : this.userId
                }).then((response) => {
                    setTimeout(() => {
                        Swal.fire({
                            title : '',
                            text : 'Reset password successfully',
                            icon : 'success',
                            allowOutsideClick: false,
                            timer : 2000,
                            showConfirmButton : false
                        }).then(() => {
                            window.location = "http://localhost:8080/AAA/public/views/login.php";
                        });
                    }, 1000);
                    
                    
                })
            }
        }
    },
})