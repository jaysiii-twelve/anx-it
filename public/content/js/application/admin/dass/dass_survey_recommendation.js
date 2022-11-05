var vm = new Vue({
    el : "#vue-dass-recommendation",
    data : {
        url_root : "/public/controller/admin/dass/",

		dassDetails : [],
		
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
					window.location = "https://anx-it.herokuapp.com/public/views/admin/dass_survey.php";
				}
			})
        },
		retrieveDassDetails : function() {
            axios.get(this.url_root + 'retrieve_dass_by_dass_id.php?dassId=' + window.sessionStorage.getItem("dassId"))
			.then(function(response) {

				vm.dassDetails = response.data;

				vm.getTotalScoreByType();
			});
        },
		getTotalScoreByType: function() {
			for(var index = 0; index < vm.dassDetails.length; index++) {
				vm.totalScore += vm.dassDetails[index].Value;
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
    },
    created() {
		this.retrieveDassDetails();
    }
})