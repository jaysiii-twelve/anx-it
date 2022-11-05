var vm = new Vue({
    el : "#vue-dashboard",
    data : {
        url_root : "/public/controller/dashboard/",

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

    },
    methods : {
        retrieveGad : function() {
            axios.get(this.url_root + 'retrieve_gad_by_user_id.php')
			.then(function(response) {
				vm.gads = response.data;
			});
        },
        retrieveDass : function() {
            axios.get(this.url_root + 'retrieve_dass_by_user_id.php')
			.then(function(response) {
				vm.dasses = response.data;
			});
        },
        retrieveKessler : function() {
            axios.get(this.url_root + 'retrieve_kessler_by_user_id.php')
			.then(function(response) {
				vm.ks = response.data;
			});
        },
        redirectToGadSurvey : function() {
            window.location = "https://anx-it.herokuapp.com/public/views/gad_7.php";
        },
        redirectToDassSurvey : function() {
            window.location = "https://anx-it.herokuapp.com/public/views/dass_21.php";
        },
        redirectToKesslerSurvey : function() {
            window.location = "https://anx-it.herokuapp.com/public/views/kessler_10.php";
        },

    },
    created() {
        this.retrieveGad();
        this.retrieveDass();
        this.retrieveKessler();
    }
})