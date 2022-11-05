var vm = new Vue({
    el : "#vue-gad-recommendation",
    data : {
        url_root : "/public/controller/gad_7/",

		gadDetails : [],
		
		totalScore: 0,

		isMinimalOrMild: false

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
					window.location = "https://anx-it.herokuapp.com/public/views/gad_7.php";
				}
			})
        },
		retrieveGadDetails : function() {
            axios.get(this.url_root + 'retrieve_gad_by_gad_id.php?gadId=' + window.sessionStorage.getItem("gadId"))
			.then(function(response) {

				vm.gadDetails = response.data;

				vm.getTotalScoreByType();
			});
        },
		getTotalScoreByType: function() {
			for(var index = 0; index < vm.gadDetails.length; index++) {
				vm.totalScore += vm.gadDetails[index].Value;
			}

			if(vm.totalScore >= 0 && vm.totalScore <= 4) {
				vm.totalScore += " (Minimal Anxiety)";
				vm.isMinimalOrMild = true;
			}
			else if (vm.totalScore >= 5 && vm.totalScore <= 9) {
				vm.totalScore += " (Mild Anxiety)";
				vm.isMinimalOrMild = true;
			}
			else if (vm.totalScore >= 10 && vm.totalScore <= 14) {
				vm.totalScore += " (Moderate Anxiety)";
				vm.isMinimalOrMild = false;
			}
			else {
				vm.totalScore += " (Severe Anxiety)";
				vm.isMinimalOrMild = false;
			}

			setTimeout(() => {
				window.print();
			}, 2000);
		},
		printPage: function() {
			window.open("https://anx-it.herokuapp.com/public/views/gad_details_print.php");
		}
    },
    created() {
		this.retrieveGadDetails();
    }
})