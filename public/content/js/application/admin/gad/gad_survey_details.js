var vm = new Vue({
    el : "#vue-gad-survey-details",
    data : {
        url_root : "/AAA/public/controller/admin/gad/",

		gadDetails : []

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
					window.location = "http://localhost:8080/AAA/public/views/admin/gad_survey.php";
				}
			})
        },
		retrieveGadDetails : function() {
            axios.get(this.url_root + 'retrieve_gad_by_gad_id.php?gadId=' + window.sessionStorage.getItem("gadId"))
			.then(function(response) {

				vm.gadDetails = response.data;
			});
        },

		printPage: function() {
			window.open("http://localhost:8080/AAA/public/views/admin/gad_survey_details_print.php");
		}
    },
    created() {
		this.retrieveGadDetails();
    }
})