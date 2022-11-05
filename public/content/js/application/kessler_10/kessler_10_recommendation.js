var vm = new Vue({
    el : "#vue-kessler-recommendation",
    data : {
        url_root : "/AAA/public/controller/kessler/",

		kesslerDetails : [],
		
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
					window.location = "http://localhost:8080/AAA/public/views/kessler_10.php";
				}
			})
        },
		retrieveKesslerDetails : function() {
            axios.get(this.url_root + 'retrieve_kessler_by_kessler_id.php?kesslerId=' + window.sessionStorage.getItem("kesslerId"))
			.then(function(response) {

				vm.kesslerDetails = response.data;

				vm.getTotalScoreByType();
			});
        },
		getTotalScoreByType: function() {
			for(var index = 0; index < vm.kesslerDetails.length; index++) {
				vm.totalScore += vm.kesslerDetails[index].Value;
			}

			if(vm.totalScore  <= 19) {
				vm.totalScore += " (Likely to be well)";
				vm.isMinimalOrMild = true;
			}
			else if (vm.totalScore >= 20 && vm.totalScore <= 24) {
				vm.totalScore += " (Likely to have a mild disorder)";
				vm.isMinimalOrMild = true;
			}
			else if (vm.totalScore >= 25 && vm.totalScore <= 29) {
				vm.totalScore += " ( Likely to have a moderate disorder)";
				vm.isMinimalOrMild = false;
			}
			else {
				vm.totalScore += " (Likely to have a severe disorder)";
				vm.isMinimalOrMild = false;
			}

			setTimeout(() => {
				window.print();
			}, 2000);
		},
    },
    created() {
		this.retrieveKesslerDetails();
    }
})