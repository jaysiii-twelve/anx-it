var vm = new Vue({
    el : "#vue-kessler-details-print",
    data : {
        url_root : "/AAA/public/controller/kessler/",

		kesslerDetails : []
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
					window.location = "http://localhost:8080/AAA/public/views/kessler_10.php";
				}
			})
        },
		retrieveKesslerDetails : function() {
            axios.get(this.url_root + 'retrieve_kessler_by_kessler_id.php?kesslerId=' + window.sessionStorage.getItem("kesslerId"))
			.then(function(response) {

				vm.kesslerDetails = response.data;


				$("#wrapper").addClass("toggled");
				$(".topbar-nav").css("display", "none");

				$("body").removeClass("bg-theme2");


				setTimeout(() => {
					window.print();
				}, 1500)

			});
        },

		printPage: function() {
			window.open("http://localhost:8080/AAA/public/views/kessler_10_details_print.php");
		}
    },
    created() {
		this.retrieveKesslerDetails();
    }
})