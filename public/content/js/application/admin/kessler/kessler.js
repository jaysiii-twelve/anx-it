Vue.component('kessler-questionnaire-datatable', {
	props : ['questionnaires'],
	template : 
	`
        <div class="table-responsive">

            <table id="kessler-questionnaire-table" class="table table-hover text-center">

				<tbody v-if="questionnaires.length > 0">
                    <tr v-for="(kesslerQuestionnaire, index) in questionnaires">
                        <td class="text-left">{{kesslerQuestionnaire.Description}}</td>
						<td>{{kesslerQuestionnaire.KesslerChoicesOne + " - " + kesslerQuestionnaire.KesslerChoicesOneDescription}}</td>
						<td>{{kesslerQuestionnaire.KesslerChoicesTwo + " - " + kesslerQuestionnaire.KesslerChoicesTwoDescription}}</td>
						<td>{{kesslerQuestionnaire.KesslerChoicesThree + " - " + kesslerQuestionnaire.KesslerChoicesThreeDescription}}</td>
						<td>{{kesslerQuestionnaire.KesslerChoicesFour + " - " + kesslerQuestionnaire.KesslerChoicesFourDescription}}</td>
						<td>{{kesslerQuestionnaire.KesslerChoicesFive + " - " + kesslerQuestionnaire.KesslerChoicesFiveDescription}}</td>
                        
						<td v-if="kesslerQuestionnaire.IsActive">Active</td>
						<td v-if="!kesslerQuestionnaire.IsActive">Deleted</td>
                        <td>
							
							<button @click="editKesslerQuestionnaire(kesslerQuestionnaire.KesslerQuestionnaireId)" class="btn btn-light btn-sm font-weight-bold ml-2">Update</button>

							<button v-if="kesslerQuestionnaire.IsActive" @click="deleteKesslerQuestionnaire(kesslerQuestionnaire.KesslerQuestionnaireId, kesslerQuestionnaire.IsActive)" class="btn btn-danger btn-sm font-weight-bold ml-2">Delete</button>

							<button v-if="!kesslerQuestionnaire.IsActive" @click="restoreKesslerQuestionnaire(kesslerQuestionnaire.KesslerQuestionnaireId, kesslerQuestionnaire.IsActive)" class="btn btn-warning btn-sm font-weight-bold ml-2">Restore</button>
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
				{ title: 'Choices Five' },
				{ title: 'Status' },
				{ title: 'Action' }
			]
		}
	},
	methods : {
		createTableHeader : function() {
			if(this.questionnaires){
				if($.fn.dataTable.isDataTable('#kessler-questionnaire-table')) $('#kessler-questionnaire-table').DataTable().destroy();
				$('#kessler-questionnaire-table').DataTable({
					ordering : false,
				  	columns: this.headers
				});
			}
		},
		editKesslerQuestionnaire : function(kesslerQuestionnaireId) {
			axios.get(vm.url_root + 'retrieve_kessler_questionnaire_by_id.php?kesslerQuestionnaireId=' + kesslerQuestionnaireId)
			.then(function(response) {
				console.log(response);

				vm.kesslerQuestionnaireId = response.data[0].KesslerQuestionnaireId;
				vm.description = response.data[0].Description;
				vm.kesslerChoicesOne = response.data[0].KesslerChoicesOne;
				vm.kesslerChoicesOneDescription = response.data[0].KesslerChoicesOneDescription;
				vm.kesslerChoicesTwo = response.data[0].KesslerChoicesTwo;
				vm.kesslerChoicesTwoDescription = response.data[0].KesslerChoicesTwoDescription;
				vm.kesslerChoicesThree = response.data[0].KesslerChoicesThree;
				vm.kesslerChoicesThreeDescription = response.data[0].KesslerChoicesThreeDescription;
				vm.kesslerChoicesFour = response.data[0].KesslerChoicesFour;
				vm.kesslerChoicesFourDescription = response.data[0].KesslerChoicesFourDescription;
				vm.kesslerChoicesFive = response.data[0].KesslerChoicesFive;
				vm.kesslerChoicesFiveDescription = response.data[0].KesslerChoicesFiveDescription;

				$("#updateQuestionnaireModal").modal("show");

			});
		},

		deleteKesslerQuestionnaire : function(kesslerQuestionnaireId, isActive) {
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
						kesslerQuestionnaireId : kesslerQuestionnaireId,
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
								vm.retrieveKesslerQuestionnaire();
							});
						}, 3000);
					});
				}
			})
		},

		restoreKesslerQuestionnaire : function(kesslerQuestionnaireId, isActive) {

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
						kesslerQuestionnaireId : kesslerQuestionnaireId,
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
								vm.retrieveKesslerQuestionnaire();
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
    el : "#vue-kessler",
    data : {
        url_root : "/public/controller/admin/kessler/",

        questionnaires: [],

		kesslerQuestionnaireId: 0,
		description: '',
		kesslerChoicesOne: '',
		kesslerChoicesOneDescription: '',
		kesslerChoicesTwo: '',
		kesslerChoicesTwoDescription: '',
		kesslerChoicesThree: '',
		kesslerChoicesThreeDescription: '',
		kesslerChoicesFour: '',
		kesslerChoicesFourDescription: '',
		kesslerChoicesFive: '',
		kesslerChoicesFiveDescription: '',


    },
    methods : {
        retrieveKesslerQuestionnaire : function() {
            axios.get(this.url_root + 'retrieve_kessler_questionnaire.php')
			.then(function(response) {
				vm.questionnaires = response.data;
			});
        },
		clearData: function() {
			this.kesslerQuestionnaireId = "";
			this.description = "";
			this.kesslerChoicesOne = "";
			this.kesslerChoicesOneDescription = "";
			this.kesslerChoicesTwo = "";
			this.kesslerChoicesTwoDescription = "";
			this.kesslerChoicesThree = "";
			this.kesslerChoicesThreeDescription = "";
			this.kesslerChoicesFour = "";
			this.kesslerChoicesFourDescription = "";
			this.kesslerChoicesFive = "";
			this.kesslerChoicesFiveDescription = "";
	
		},

		validateForm : function() {
			var found = false;

			if(this.description.trim() == "") {
				found = true;
			}

			if(this.kesslerChoicesOne == "") {
				found = true;
			}

			if(this.kesslerChoicesOneDescription.trim() == "") {
				found = true;
			}

			if(this.kesslerChoicesTwo == "") {
				found = true;
			}

			if(this.kesslerChoicesTwoDescription.trim() == "") {
				found = true;
			}

			if(this.kesslerChoicesThree == "") {
				found = true;
			}

			if(this.kesslerChoicesThreeDescription.trim() == "") {
				found = true;
			}

			if(this.kesslerChoicesFour == "") {
				found = true;
			}

			if(this.kesslerChoicesFourDescription.trim() == "") {
				found = true;
			}

			if(this.kesslerChoicesFive == "") {
				found = true;
			}

			if(this.kesslerChoicesFiveDescription.trim() == "") {
				found = true;
			}

			return found;
		},
		addKesslerQuestionnaire : function() {

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
				axios.post(this.url_root + "add_kessler_questionnaire.php", {
					description : this.description,
					kesslerChoicesOne : this.kesslerChoicesOne,
					kesslerChoicesOneDescription : this.kesslerChoicesOneDescription,
					kesslerChoicesTwo : this.kesslerChoicesTwo,
					kesslerChoicesTwoDescription : this.kesslerChoicesTwoDescription,
					kesslerChoicesThree : this.kesslerChoicesThree,
					kesslerChoicesThreeDescription : this.kesslerChoicesThreeDescription,
					kesslerChoicesFour : this.kesslerChoicesFour,
					kesslerChoicesFourDescription : this.kesslerChoicesFourDescription,
					kesslerChoicesFive : this.kesslerChoicesFive,
					kesslerChoicesFiveDescription : this.kesslerChoicesFiveDescription
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
							text : 'Kessler Questionnaire added successfully',
							icon : 'success',
							allowOutsideClick: false,
							timer : 3000,
							showConfirmButton : false
						}).then(() => {
							vm.questionnaires = [];
							vm.clearData();
							vm.retrieveKesslerQuestionnaire();
						});
					}, 3000);
				})
			}
		},

		updateKesslerQuestionnaire : function() {
			axios.post(this.url_root + "update_kessler_questionnaire.php", {
				kesslerQuestionnaireId : this.kesslerQuestionnaireId,
				description : this.description,
				kesslerChoicesOne : this.kesslerChoicesOne,
				kesslerChoicesOneDescription : this.kesslerChoicesOneDescription,
				kesslerChoicesTwo : this.kesslerChoicesTwo,
				kesslerChoicesTwoDescription : this.kesslerChoicesTwoDescription,
				kesslerChoicesThree : this.kesslerChoicesThree,
				kesslerChoicesThreeDescription : this.kesslerChoicesThreeDescription,
				kesslerChoicesFour : this.kesslerChoicesFour,
				kesslerChoicesFourDescription : this.kesslerChoicesFourDescription,
				kesslerChoicesFive : this.kesslerChoicesFive,
				kesslerChoicesFiveDescription : this.kesslerChoicesFiveDescription
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
						text : 'Kessler Questionnaire updated successfully',
						icon : 'success',
						allowOutsideClick: false,
						timer : 3000,
						showConfirmButton : false
					}).then(() => {
						vm.questionnaires = [];
						vm.clearData();
						vm.retrieveKesslerQuestionnaire();
					});
				}, 3000);
			})
		}
		
    },
    created() {
        this.retrieveKesslerQuestionnaire();
    }
})