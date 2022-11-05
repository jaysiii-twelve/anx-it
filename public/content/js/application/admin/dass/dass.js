Vue.component('dass-questionnaire-datatable', {
	props : ['questionnaires'],
	template : 
	`
        <div class="table-responsive">

            <table id="dass-questionnaire-table" class="table table-hover text-center">

				<tbody v-if="questionnaires.length > 0">
                    <tr v-for="(dassQuestionnaire, index) in questionnaires">
                        <td class="text-left">{{dassQuestionnaire.Description}}</td>
						<td>{{dassQuestionnaire.DassChoicesOne + " - " + dassQuestionnaire.DassChoicesOneDescription}}</td>
						<td>{{dassQuestionnaire.DassChoicesTwo + " - " + dassQuestionnaire.DassChoicesTwoDescription}}</td>
						<td>{{dassQuestionnaire.DassChoicesThree + " - " + dassQuestionnaire.DassChoicesThreeDescription}}</td>
						<td>{{dassQuestionnaire.DassChoicesFour + " - " + dassQuestionnaire.DassChoicesFourDescription}}</td>
                        
						<td v-if="dassQuestionnaire.IsActive">Active</td>
						<td v-if="!dassQuestionnaire.IsActive">Deleted</td>
                        <td>
							
							<button @click="editDassQuestionnaire(dassQuestionnaire.DassQuestionnaireId)" class="btn btn-light btn-sm font-weight-bold ml-2">Update</button>

							<button v-if="dassQuestionnaire.IsActive" @click="deleteDassQuestionnaire(dassQuestionnaire.DassQuestionnaireId, dassQuestionnaire.IsActive)" class="btn btn-danger btn-sm font-weight-bold ml-2">Delete</button>

							<button v-if="!dassQuestionnaire.IsActive" @click="restoreDassQuestionnaire(dassQuestionnaire.DassQuestionnaireId, dassQuestionnaire.IsActive)" class="btn btn-warning btn-sm font-weight-bold ml-2">Restore</button>
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
				if($.fn.dataTable.isDataTable('#dass-questionnaire-table')) $('#dass-questionnaire-table').DataTable().destroy();
				$('#dass-questionnaire-table').DataTable({
					ordering : false,
				  	columns: this.headers
				});
			}
		},
		editDassQuestionnaire : function(dassQuestionnaireId) {
			axios.get(vm.url_root + 'retrieve_dass_questionnaire_by_id.php?dassQuestionnaireId=' + dassQuestionnaireId)
			.then(function(response) {
				console.log(response);

				vm.dassQuestionnaireId = response.data[0].DassQuestionnaireId;
				vm.description = response.data[0].Description;
				vm.dassChoicesOne = response.data[0].DassChoicesOne;
				vm.dassChoicesOneDescription = response.data[0].DassChoicesOneDescription;
				vm.dassChoicesTwo = response.data[0].DassChoicesTwo;
				vm.dassChoicesTwoDescription = response.data[0].DassChoicesTwoDescription;
				vm.dassChoicesThree = response.data[0].DassChoicesThree;
				vm.dassChoicesThreeDescription = response.data[0].DassChoicesThreeDescription;
				vm.dassChoicesFour = response.data[0].DassChoicesFour;
				vm.dassChoicesFourDescription = response.data[0].DassChoicesFourDescription;

				$("#updateQuestionnaireModal").modal("show");

			});
		},

		deleteDassQuestionnaire : function(dassQuestionnaireId, isActive) {
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
						dassQuestionnaireId : dassQuestionnaireId,
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
								vm.retrieveDassQuestionnaire();
							});
						}, 3000);
					});
				}
			})
		},

		restoreDassQuestionnaire : function(dassQuestionnaireId, isActive) {

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
						dassQuestionnaireId : dassQuestionnaireId,
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
								vm.retrieveDassQuestionnaire();
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
    el : "#vue-dass",
    data : {
        url_root : "/public/controller/admin/dass/",

        questionnaires: [],

		dassQuestionnaireId: 0,
		description: '',
		dassChoicesOne: '',
		dassChoicesOneDescription: '',
		dassChoicesTwo: '',
		dassChoicesTwoDescription: '',
		dassChoicesThree: '',
		dassChoicesThreeDescription: '',
		dassChoicesFour: '',
		dassChoicesFourDescription: '',


    },
    methods : {
        retrieveDassQuestionnaire : function() {
            axios.get(this.url_root + 'retrieve_dass_questionnaire.php')
			.then(function(response) {
				vm.questionnaires = response.data;
			});
        },
		clearData: function() {
			this.dassQuestionnaireId = "";
			this.description = "";
			this.dassChoicesOne = "";
			this.dassChoicesOneDescription = "";
			this.dassChoicesTwo = "";
			this.dassChoicesTwoDescription = "";
			this.dassChoicesThree = "";
			this.dassChoicesThreeDescription = "";
			this.dassChoicesFour = "";
			this.dassChoicesFourDescription = "";
	
		},

		validateForm : function() {
			var found = false;

			if(this.description.trim() == "") {
				found = true;
			}

			if(this.dassChoicesOne == "") {
				found = true;
			}

			if(this.dassChoicesOneDescription.trim() == "") {
				found = true;
			}

			if(this.dassChoicesTwo == "") {
				found = true;
			}

			if(this.dassChoicesTwoDescription.trim() == "") {
				found = true;
			}

			if(this.dassChoicesThree == "") {
				found = true;
			}

			if(this.dassChoicesThreeDescription.trim() == "") {
				found = true;
			}

			if(this.dassChoicesFour == "") {
				found = true;
			}

			if(this.dassChoicesFourDescription.trim() == "") {
				found = true;
			}

			return found;
		},
		addDassQuestionnaire : function() {

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
				axios.post(this.url_root + "add_dass_questionnaire.php", {
					description : this.description,
					dassChoicesOne : this.dassChoicesOne,
					dassChoicesOneDescription : this.dassChoicesOneDescription,
					dassChoicesTwo : this.dassChoicesTwo,
					dassChoicesTwoDescription : this.dassChoicesTwoDescription,
					dassChoicesThree : this.dassChoicesThree,
					dassChoicesThreeDescription : this.dassChoicesThreeDescription,
					dassChoicesFour : this.dassChoicesFour,
					dassChoicesFourDescription : this.dassChoicesFourDescription
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
							text : 'Dass Questionnaire added successfully',
							icon : 'success',
							allowOutsideClick: false,
							timer : 3000,
							showConfirmButton : false
						}).then(() => {
							vm.questionnaires = [];
							vm.clearData();
							vm.retrieveDassQuestionnaire();
						});
					}, 3000);
				})
			}
		},

		updateDassQuestionnaire : function() {
			axios.post(this.url_root + "update_dass_questionnaire.php", {
				dassQuestionnaireId : this.dassQuestionnaireId,
				description : this.description,
				dassChoicesOne : this.dassChoicesOne,
				dassChoicesOneDescription : this.dassChoicesOneDescription,
				dassChoicesTwo : this.dassChoicesTwo,
				dassChoicesTwoDescription : this.dassChoicesTwoDescription,
				dassChoicesThree : this.dassChoicesThree,
				dassChoicesThreeDescription : this.dassChoicesThreeDescription,
				dassChoicesFour : this.dassChoicesFour,
				dassChoicesFourDescription : this.dassChoicesFourDescription
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
						text : 'Dass Questionnaire updated successfully',
						icon : 'success',
						allowOutsideClick: false,
						timer : 3000,
						showConfirmButton : false
					}).then(() => {
						vm.questionnaires = [];
						vm.clearData();
						vm.retrieveDassQuestionnaire();
					});
				}, 3000);
			})
		}
		
    },
    created() {
        this.retrieveDassQuestionnaire();
    }
})