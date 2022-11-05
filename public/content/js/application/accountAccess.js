var vm = new Vue({
    el : "#vue-account-access",
    data : {
        url_root : "/AAA/public/controller/accountAccess/",

        emailAddress : '',
        password : '',
		errors : [],
		error_title : '',

		error_design : {
			backgroundColor : 'antiquewhite',
			padding : '20px 20px 20px 20px',
			color : '#d41616'
		},
    },
    methods : {
        verifyEmail : function() {
            this.errors = [];
			
            if(this.emailAddress.trim() == '') {
				this.errors.push('Email Addresss is required!');
            }
            
            if(this.errors.length == 0) {
                axios.post(this.url_root + "verify_email_access.php", {
                    emailAddress : this.emailAddress
                }).then((response) => {
                    $(".pace").removeClass("pace-inactive");
                    $(".pace").addClass("pace-active");
                    if(response.data.isFound) 
                    {
                        setTimeout(() => {
                            $(".pace").removeClass("pace-active");
                            $(".pace").addClass("pace-inactive");
                            vm.errors.push(response.data.message);
                        }, 3000);
                    }
                    else {
                        setTimeout(() => {
                            $(".pace").removeClass("pace-active");
                            $(".pace").addClass("pace-inactive");
                            vm.errors.push(response.data.message);
                        }, 3000);
                    }
                })
            }
        },
    },
})