Vue.component('gad-questionnaire-datatable', {
	props : ['questionnaires'],
	template : 
	`
        <div class="table-responsive">

            <table id="gad-questionnaire-table" class="table table-hover text-center">

				<tbody v-if="questionnaires.length > 0">
                    <tr v-for="(gadQuestionnaire, index) in questionnaires">
                        <td class="text-left">{{gadQuestionnaire.Description}}</td>
						<td>{{gadQuestionnaire.GadChoicesOne + " - " + gadQuestionnaire.GadChoicesOneDescription}}</td>
						<td>{{gadQuestionnaire.GadChoicesTwo + " - " + gadQuestionnaire.GadChoicesTwoDescription}}</td>
						<td>{{gadQuestionnaire.GadChoicesThree + " - " + gadQuestionnaire.GadChoicesThreeDescription}}</td>
						<td>{{gadQuestionnaire.GadChoicesFour + " - " + gadQuestionnaire.GadChoicesFourDescription}}</td>
                        
						<td v-if="gadQuestionnaire.IsActive">Active</td>
						<td v-if="!gadQuestionnaire.IsActive">Deleted</td>
                        <td>
							
							<button @click="editGadQuestionnaire(gadQuestionnaire.GadQuestionnaireId)" class="btn btn-light btn-sm font-weight-bold ml-2">Update</button>

							<button v-if="gadQuestionnaire.IsActive" @click="deleteGadQuestionnaire(gadQuestionnaire.GadQuestionnaireId, gadQuestionnaire.IsActive)" class="btn btn-danger btn-sm font-weight-bold ml-2">Delete</button>

							<button v-if="!gadQuestionnaire.IsActive" @click="restoreGadQuestionnaire(gadQuestionnaire.GadQuestionnaireId, gadQuestionnaire.IsActive)" class="btn btn-warning btn-sm font-weight-bold ml-2">Restore</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
	`,
	data() {
		return {
			headers: [
				{ title: 'Description' },
				{ title: 'Choices One' },
				{ title: 'Choices Two' },
				{ title: 'Choices Three' },
				{ title: 'Choices Four' },
				{ title: 'Status' },
				{ title: 'Action' }
			]
		}
	},
	methods : {
		createTableHeader : function() {
			if(this.questionnaires){
				if($.fn.dataTable.isDataTable('#gad-questionnaire-table')) $('#gad-questionnaire-table').DataTable().destroy();
				$('#gad-questionnaire-table').DataTable({
					ordering : false,
				  	columns: this.headers
				});
			}
		},
		editGadQuestionnaire : function(gadQuestionnaireId) {
			axios.get(vm.url_root + 'retrieve_gad_questionnaire_by_id.php?gadQuestionnaireId=' + gadQuestionnaireId)
			.then(function(response) {
				console.log(response);

				vm.gadQuestionnaireId = response.data[0].GadQuestionnaireId;
				vm.description = response.data[0].Description;
				vm.choicesOne = response.data[0].GadChoicesOne;
				vm.choicesOneDescription = response.data[0].GadChoicesOneDescription;
				vm.choicesTwo = response.data[0].GadChoicesTwo;
				vm.choicesTwoDescription = response.data[0].GadChoicesTwoDescription;
				vm.choicesThree = response.data[0].GadChoicesThree;
				vm.choicesThreeDescription = response.data[0].GadChoicesThreeDescription;
				vm.choicesFour = response.data[0].GadChoicesFour;
				vm.choicesFourDescription = response.data[0].GadChoicesFourDescription;

				$("#updateQuestionnaireModal").modal("show");

			});
		},

		deleteGadQuestionnaire : function(gadQuestionnaireId, isActive) {
			Swal.fire({
				title: '',
				text: "Delete this questionnaire ?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Delete',
				allowOutsideClick: false
			  }).then((result) => {
				if(result.value) {
					axios.post(vm.url_root + 'update_status.php', {
						gadQuestionnaireId : gadQuestionnaireId,
						isActive: isActive ? false : true
					}).then(function(response) {
						$(".pace").removeClass("pace-inactive");
                    	$(".pace").addClass("pace-active");
						setTimeout(() => {
							$(".pace").removeClass("pace-active");
							$(".pace").addClass("pace-inactive");
							Swal.fire({
								title : 'Questionnaire status',
								text : 'Questionnaire deleted successfully',
								icon : 'success',
								allowOutsideClick: false,
								timer : 3000,
								showConfirmButton : false
							}).then(() => {
								vm.retrieveGadQuestionnaire();
							});
						}, 3000);
					});
				}
			})
		},

		restoreGadQuestionnaire : function(gadQuestionnaireId, isActive) {

			Swal.fire({
				title: '',
				text: "Restore this questionnaire ?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#e67c02',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Restore',
				allowOutsideClick: false
			}).then((result) => {
				if(result.value) {
					axios.post(vm.url_root + 'update_status.php', {
						gadQuestionnaireId : gadQuestionnaireId,
						isActive: isActive ? false : true
					}).then(function(response) {
						$(".pace").removeClass("pace-inactive");
                    	$(".pace").addClass("pace-active");
						setTimeout(() => {
							$(".pace").removeClass("pace-active");
							$(".pace").addClass("pace-inactive");
							Swal.fire({
								title : 'Questionnaire status',
								text : 'Questionnaire retored successfully',
								icon : 'success',
								allowOutsideClick: false,
								timer : 3000,
								showConfirmButton : false
							}).then(() => {
								vm.retrieveGadQuestionnaire();
							});
						}, 3000);
					});
				}
			})
		},
	},
	updated() {
		this.createTableHeader();
	}
});

var vm = new Vue({
    el : "#vue-gad",
    data : {
        url_root : "/public/controller/psychiatrist/gad/",

        questionnaires: [],

		gadQuestionnaireId: 0,
		description: '',
		choicesOne: '',
		choicesOneDescription: '',
		choicesTwo: '',
		choicesTwoDescription: '',
		choicesThree: '',
		choicesThreeDescription: '',
		choicesFour: '',
		choicesFourDescription: '',


    },
    methods : {
        retrieveGadQuestionnaire : function() {
            axios.get(this.url_root + 'retrieve_gad_questionnaire.php')
			.then(function(response) {
				vm.questionnaires = response.data;
			});
        },
		clearData: function() {
			this.gadQuestionnaireId = "";
			this.description = "";
			this.choicesOne = "";
			this.choicesOneDescription = "";
			this.choicesTwo = "";
			this.choicesTwoDescription = "";
			this.choicesThree = "";
			this.choicesThreeDescription = "";
			this.choicesFour = "";
			this.choicesFourDescription = "";
	
		},

		validateForm : function() {
			var found = false;

			if(this.description.trim() == "") {
				found = true;
			}

			if(this.choicesOne == "") {
				found = true;
			}

			if(this.choicesOneDescription.trim() == "") {
				found = true;
			}

			if(this.choicesTwo == "") {
				found = true;
			}

			if(this.choicesTwoDescription.trim() == "") {
				found = true;
			}

			if(this.choicesThree == "") {
				found = true;
			}

			if(this.choicesThreeDescription.trim() == "") {
				found = true;
			}

			if(this.choicesFour == "") {
				found = true;
			}

			if(this.choicesFourDescription.trim() == "") {
				found = true;
			}

			return found;
		},
		addGadQuestionnaire : function() {

			if(this.validateForm()) {
				Swal.fire({
					title : '',
					text : 'Please fill up the form properly.',
					icon : 'error',
					allowOutsideClick: false,
					timer : 3000,
					showConfirmButton : false
				});
			}
			else {
				axios.post(this.url_root + "add_gad_questionnaire.php", {
					description : this.description,
					choicesOne : this.choicesOne,
					choicesOneDescription : this.choicesOneDescription,
					choicesTwo : this.choicesTwo,
					choicesTwoDescription : this.choicesTwoDescription,
					choicesThree : this.choicesThree,
					choicesThreeDescription : this.choicesThreeDescription,
					choicesFour : this.choicesFour,
					choicesFourDescription : this.choicesFourDescription
				}).then((response) => {
					console.log(response);
					$(".pace").removeClass("pace-inactive");
					$(".pace").addClass("pace-active");
					setTimeout(() => {
						$(".pace").removeClass("pace-active");
						$(".pace").addClass("pace-inactive");
						$("#addQuestionnaireModal").modal("hide");
	
						Swal.fire({
							title : 'Add status',
							text : 'Gad Questionnaire added successfully',
							icon : 'success',
							allowOutsideClick: false,
							timer : 3000,
							showConfirmButton : false
						}).then(() => {
							vm.questionnaires = [];
							vm.clearData();
							vm.retrieveGadQuestionnaire();
						});
					}, 3000);
				})
			}
		},

		updateGadQuestionnaire : function() {
			axios.post(this.url_root + "update_gad_questionnaire.php", {
				gadQuestionnaireId : this.gadQuestionnaireId,
				description : this.description,
				choicesOne : this.choicesOne,
				choicesOneDescription : this.choicesOneDescription,
				choicesTwo : this.choicesTwo,
				choicesTwoDescription : this.choicesTwoDescription,
				choicesThree : this.choicesThree,
				choicesThreeDescription : this.choicesThreeDescription,
				choicesFour : this.choicesFour,
				choicesFourDescription : this.choicesFourDescription
			}).then((response) => {
				console.log(response);
				$(".pace").removeClass("pace-inactive");
				$(".pace").addClass("pace-active");
				setTimeout(() => {
					$(".pace").removeClass("pace-active");
					$(".pace").addClass("pace-inactive");
					$("#updateQuestionnaireModal").modal("hide");

					Swal.fire({
						title : 'Update status',
						text : 'Gad Questionnaire updated successfully',
						icon : 'success',
						allowOutsideClick: false,
						timer : 3000,
						showConfirmButton : false
					}).then(() => {
						vm.questionnaires = [];
						vm.clearData();
						vm.retrieveGadQuestionnaire();
					});
				}, 3000);
			})
		}
		
    },
    created() {
        this.retrieveGadQuestionnaire();
    }
})