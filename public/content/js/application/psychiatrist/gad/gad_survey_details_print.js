var vm = new Vue({
    el : "#vue-gad-survey-details-print",
    data : {
        url_root : "/AAA/public/controller/psychiatrist/gad/",

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
					window.location = "http://localhost:8080/AAA/public/views/psychiatrist/gad_survey.php";
				}
			})
        },
		retrieveGadDetails : function() {
            axios.get(this.url_root + 'retrieve_gad_by_gad_id.php?gadId=' + window.sessionStorage.getItem("gadId"))
			.then(function(response) {

				vm.gadDetails = response.data;


				$("#wrapper").addClass("toggled");
				$(".topbar-nav").css("display", "none");

				$("body").removeClass("bg-theme2");


				setTimeout(() => {
					window.print();
				}, 1500)
				
			});
        },
    },
    created() {
		this.retrieveGadDetails();
    }
})