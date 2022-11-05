var vm = new Vue({
    el : "#vue-add-kessler-10",
    data : {
        url_root : "/public/controller/kessler/",

		questionnaires: [],

		kesslerQuestionnaireDetails: [],
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
					window.location = "https://anx-it.herokuapp.com/public/views/kessler_10.php";
				}
			})
        },
		saveKessler: function() {
			if(this.questionnaires.length != this.kesslerQuestionnaireDetails.length) {
				Swal.fire({
					title : '',
					text : 'Please answer all the question.',
					icon : 'error',
					allowOutsideClick: false,
					timer : 2000,
					showConfirmButton : false
				});
			}
			else {
				Swal.fire({
					title: '',
					text: "Are you sure you want to save ?",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes',
					allowOutsideClick: false
				  }).then((result) => {
					if(result.value) {
						$(".pace").removeClass("pace-inactive");
						$(".pace").addClass("pace-active");
						axios.post(this.url_root + "add_kessler.php")
						.then((response) => {
							vm.saveKesslerDetails();
						})
					}
				})
			}
		},
		saveKesslerDetails: function() {
			axios.post(this.url_root + "add_kessler_details.php", {
				kesslerQuestionnaireDetails: this.kesslerQuestionnaireDetails
			}).then((response) => {
				console.log(response)
				setTimeout(() => {
					$(".pace").removeClass("pace-active");
					$(".pace").addClass("pace-inactive");
					Swal.fire({
						title : '',
						text : 'Survey Completed.',
						icon : 'success',
						allowOutsideClick: false,
						timer : 2000,
						showConfirmButton : false
					}).then(() => {
						window.location = "https://anx-it.herokuapp.com/public/views/kessler_10.php";
					});
				}, 1000);
				
				
			})
		},
		retrieveKesslerQuestionnaires: function() {
			axios.get('/AAA/public/controller/admin/kessler/retrieve_kessler_questionnaire.php')
			.then(function(response) {
				console.log(response);
				vm.questionnaires = response.data;
			});
		},
		getElementName: function(index) {
			return "kesslerScale" + index;
		},
		getAnswer: function(value, kesslerQuestionnaireId) {
			var kesslerQuestionnaireProperty = {
				kesslerQuestionnaireId : 0,
				value: 0
			};

			if(this.kesslerQuestionnaireDetails.length == 0) {
				kesslerQuestionnaireProperty.kesslerQuestionnaireId = kesslerQuestionnaireId;
				kesslerQuestionnaireProperty.value = value;

				this.kesslerQuestionnaireDetails.push(kesslerQuestionnaireProperty);
			}
			else {
				for(var index = 0; index < this.kesslerQuestionnaireDetails.length; index++) {
					if(this.checkIfKesslerQuestionnaireIdExist(kesslerQuestionnaireId)) {
						if(this.kesslerQuestionnaireDetails[index].kesslerQuestionnaireId == kesslerQuestionnaireId) {
							this.kesslerQuestionnaireDetails[index].value = value;
						}
					}
					else {
						kesslerQuestionnaireProperty.kesslerQuestionnaireId = kesslerQuestionnaireId;
						kesslerQuestionnaireProperty.value = value;

						this.kesslerQuestionnaireDetails.push(kesslerQuestionnaireProperty);
					}
					
				}
			}
			
		},
		checkIfKesslerQuestionnaireIdExist: function(kesslerQuestionnaireId) {
			var found = false;
			for(var index = 0; index < this.kesslerQuestionnaireDetails.length; index++) {
				if(this.kesslerQuestionnaireDetails[index].kesslerQuestionnaireId == kesslerQuestionnaireId) {
					found = true;
				}
			}

			return found;
		}
		
    },
    created() {
		this.retrieveKesslerQuestionnaires();
    }
})