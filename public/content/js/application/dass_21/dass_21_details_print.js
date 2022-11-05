var vm = new Vue({
    el : "#vue-dass-21-details-print",
    data : {
        url_root : "/public/controller/dass_21/",

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
					window.location = "https://anx-it.herokuapp.com/public/views/dass_21.php";
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
		printPage: function() {
			window.open("https://anx-it.herokuapp.com/public/views/dass_details_print.php");
		}
    },
    created() {
		this.retrieveDassDetails();
    }
})