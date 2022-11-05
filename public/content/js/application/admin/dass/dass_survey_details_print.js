var vm = new Vue({
    el : "#vue-dass-survey-details-print",
    data : {
        url_root : "/AAA/public/controller/admin/dass/",

		dassDetails : []
    },
    methods : {
        redirectToMain: function(e) {
            e.preventDefault();

			Swal.fire({
				title: 'Continue?',
				text: "",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes',
				allowOutsideClick: false
			  }).then((result) => {
				if(result.value) {
					window.location = "http://localhost:8080/AAA/public/views/admin/dass_survey.php";
				}
			})
        },
		retrieveDassDetails : function() {
            axios.get(this.url_root + 'retrieve_dass_by_dass_id.php?dassId=' + window.sessionStorage.getItem("dassId"))
			.then(function(response) {

				vm.dassDetails = response.data;


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
		this.retrieveDassDetails();
    }
})