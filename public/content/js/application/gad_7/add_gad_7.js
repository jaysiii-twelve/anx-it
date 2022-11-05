var vm = new Vue({
    el : "#vue-add-gad-7",
    data : {
        url_root : "/public/controller/gad_7/",

		questionnaires: [],

		gadQuestionnaireDetails: [],

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
		saveGad: function() {
			if(this.questionnaires.length != this.gadQuestionnaireDetails.length) {
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
						axios.post(this.url_root + "add_gad.php")
						.then((response) => {
							vm.saveGadDetails();
						})
					}
				})
			}
		},
		saveGadDetails: function() {
			axios.post(this.url_root + "add_gad_details.php", {
				gadQuestionnaireDetails: this.gadQuestionnaireDetails
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
						window.location = "https://anx-it.herokuapp.com/public/views/gad_7.php";
					});
				}, 1000);
				
				
			})
		},
		retrieveGadQuestionnaires: function() {
			axios.get('/AAA/public/controller/admin/gad/retrieve_gad_questionnaire.php')
			.then(function(response) {
				vm.questionnaires = response.data;
			});
		},
		getElementName: function(index) {
			return "gadScale" + index;
		},
		getAnswer: function(value, gadQuestionnaireId) {
			var gadQuestionnaireProperty = {
				gadQuestionnaireId : 0,
				value: 0
			};

			if(this.gadQuestionnaireDetails.length == 0) {
				gadQuestionnaireProperty.gadQuestionnaireId = gadQuestionnaireId;
				gadQuestionnaireProperty.value = value;

				this.gadQuestionnaireDetails.push(gadQuestionnaireProperty);
			}
			else {
				for(var index = 0; index < this.gadQuestionnaireDetails.length; index++) {
					if(this.checkIfGadQuestionnaireIdExist(gadQuestionnaireId)) {
						if(this.gadQuestionnaireDetails[index].gadQuestionnaireId == gadQuestionnaireId) {
							this.gadQuestionnaireDetails[index].value = value;
						}
					}
					else {
						gadQuestionnaireProperty.gadQuestionnaireId = gadQuestionnaireId;
						gadQuestionnaireProperty.value = value;

						this.gadQuestionnaireDetails.push(gadQuestionnaireProperty);
					}
					
				}
			}
			
		},
		checkIfGadQuestionnaireIdExist: function(gadQuestionnaireId) {
			var found = false;
			for(var index = 0; index < this.gadQuestionnaireDetails.length; index++) {
				if(this.gadQuestionnaireDetails[index].gadQuestionnaireId == gadQuestionnaireId) {
					found = true;
				}
			}

			return found;
		}
    },
    created() {
		this.retrieveGadQuestionnaires();
    }
})