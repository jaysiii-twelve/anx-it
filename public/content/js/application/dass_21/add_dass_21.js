var vm = new Vue({
    el : "#vue-add-dass-21",
    data : {
        url_root : "/AAA/public/controller/dass_21/",

		questionnaires: [],

		dassQuestionnaireDetails: [],

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
					window.location = "http://localhost:8080/AAA/public/views/dass_21.php";
				}
			})
        },
		saveDass: function() {
			if(this.questionnaires.length != this.dassQuestionnaireDetails.length) {
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
						axios.post(this.url_root + "add_dass.php")
						.then((response) => {
							vm.saveDassDetails();
						})
					}
				})
			}
		},
		saveDassDetails: function() {
			axios.post(this.url_root + "add_dass_details.php", {
				dassQuestionnaireDetails: this.dassQuestionnaireDetails
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
						window.location = "http://localhost:8080/AAA/public/views/dass_21.php";
					});
				}, 1000);
				
				
			})
		},
		retrieveDassQuestionnaires: function() {
			axios.get('/AAA/public/controller/admin/dass/retrieve_dass_questionnaire.php')
			.then(function(response) {
				vm.questionnaires = response.data;
			});
		},
		getElementName: function(index) {
			return "dassScale" + index;
		},
		getAnswer: function(value, dassQuestionnaireId) {
			var dassQuestionnaireProperty = {
				dassQuestionnaireId : 0,
				value: 0
			};

			if(this.dassQuestionnaireDetails.length == 0) {
				dassQuestionnaireProperty.dassQuestionnaireId = dassQuestionnaireId;
				dassQuestionnaireProperty.value = value;

				this.dassQuestionnaireDetails.push(dassQuestionnaireProperty);
			}
			else {
				for(var index = 0; index < this.dassQuestionnaireDetails.length; index++) {
					if(this.checkIfDassQuestionnaireIdExist(dassQuestionnaireId)) {
						if(this.dassQuestionnaireDetails[index].dassQuestionnaireId == dassQuestionnaireId) {
							this.dassQuestionnaireDetails[index].value = value;
						}
					}
					else {
						dassQuestionnaireProperty.dassQuestionnaireId = dassQuestionnaireId;
						dassQuestionnaireProperty.value = value;

						this.dassQuestionnaireDetails.push(dassQuestionnaireProperty);
					}
					
				}
			}
			
		},
		checkIfDassQuestionnaireIdExist: function(dassQuestionnaireId) {
			var found = false;
			for(var index = 0; index < this.dassQuestionnaireDetails.length; index++) {
				if(this.dassQuestionnaireDetails[index].dassQuestionnaireId == dassQuestionnaireId) {
					found = true;
				}
			}

			return found;
		}
    },
    created() {
		this.retrieveDassQuestionnaires();
    }
})