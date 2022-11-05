var vm = new Vue({
    el : "#vue-dashboard",
    data : {
        url_root : "/public/controller/admin/dashboard/",

        emailAddress : '',
        password : '',

		errors : [],
		error_title : '',

		error_design : {
			padding : '20px 20px 20px 20px',
			color : '#d41616'
		},

        showPassword : false,

        gads: [],
        dasses: [],
        ks: [],
        users: []

    },
    methods : {
        retrieveGad : function() {
            axios.get(this.url_root + 'retrieve_gad.php')
			.then(function(response) {
				vm.gads = response.data;
			});
        },
        retrieveDass : function() {
            axios.get(this.url_root + 'retrieve_dass.php')
			.then(function(response) {
				vm.dasses = response.data;
			});
        },
        retrieveUser : function() {
            axios.get(this.url_root + 'retrieve_user.php')
			.then(function(response) {
				console.log(response);
				vm.users = response.data;
			});
        },
        retrieveKessler : function() {
            axios.get(this.url_root + 'retrieve_kessler.php')
			.then(function(response) {
				vm.ks = response.data;
			});
        },
        redirectToGadSurvey : function() {
            window.location = "https://anx-it.herokuapp.com/public/views/admin/gad_survey.php";
        },
        redirectToDassSurvey : function() {
            window.location = "https://anx-it.herokuapp.com/public/views/admin/dass_survey.php";
        },
        redirectToKesslerSurvey : function() {
            window.location = "https://anx-it.herokuapp.com/public/views/admin/kessler_survey.php";
        },

    },
    created() {
        this.retrieveGad();
        this.retrieveDass();
        this.retrieveKessler();
        this.retrieveUser();
    }
})