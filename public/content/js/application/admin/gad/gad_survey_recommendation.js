var vm = new Vue({
    el : "#vue-gad-survey-recommendation",
    data : {
        url_root : "/AAA/public/controller/admin/gad/",

		gadDetails : [],
		
		totalScore: 0,

		isMinimalOrMild: false

    },
    methods : {
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
    },
    created() {
		this.retrieveGadDetails();
    }
})