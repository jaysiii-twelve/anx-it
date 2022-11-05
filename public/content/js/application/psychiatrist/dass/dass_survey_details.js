var vm = new Vue({
    el : "#vue-dass-survey-details",
    data : {
        url_root : "/AAA/public/controller/psychiatrist/dass/",

		dassDetails : []
    },
    methods : {
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
					window.location = "http://localhost:8080/AAA/public/views/psychiatrist/dass_survey.php";
				}
			})
        },
		retrieveDassDetails : function() {
            axios.get(this.url_root + 'retrieve_dass_by_dass_id.php?dassId=' + window.sessionStorage.getItem("dassId"))
			.then(function(response) {

				vm.dassDetails = response.data;
			});
        },

		printPage: function() {
			window.open("http://localhost:8080/AAA/public/views/psychiatrist/dass_survey_details_print.php");
		}
    },
    created() {
		this.retrieveDassDetails();
    }
})