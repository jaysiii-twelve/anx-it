Vue.component('dass-management-datatable', {
	props : ['dasses'],
	template : 
	`
        <div class="table-responsive">
            <table id="dass-table" class="table table-hover text-center">
                <tbody v-if="dasses.length > 0">
                    <tr v-for="(dass, index) in dasses">
                        <td>{{dass.DassId}}</td>
                        <td>{{dass.DateCreated}}</td>
                        <td>
                            <button @click="redirectToDetails(dass.DassId)" class="btn btn-light btn-sm font-weight-bold ml-2">Details</button>

							<button @click="redirectToSurveyReport(dass.DassId)" class="btn btn-light btn-sm font-weight-bold ml-2">Print Report</button>
                        </td>
                    </tr>
          
                </tbody>
            </table>
        </div>
	`,
	data() {
		return {
			headers: [
				{ title: 'DASS No.' },
				{ title: 'Date Created' },
				{ title: 'Action' }
			]
		}
	},
	methods : {
		createTableHeader : function() {
			if(this.dasses){
				if($.fn.dataTable.isDataTable('#dass-table')) $('#dass-table').DataTable().destroy();
				$('#dass-table').DataTable({
					ordering : false,
				  	columns: this.headers
				});
			}
		},
		redirectToDetails : function(dassId) {
			window.sessionStorage.setItem("dassId", dassId);

			window.location = "http://localhost:8080/AAA/public/views/dass_21_details.php";
		},
		redirectToSurveyReport : function(dassId) {
			console.log(dassId);

			window.sessionStorage.setItem("dassId", dassId);

			window.open("http://localhost:8080/AAA/public/views/dass_21_recommendation.php");
		}
	},
	updated() {
		this.createTableHeader();
	}
});

var vm = new Vue({
    el : "#vue-dass-21",
    data : {
        url_root : "/AAA/public/controller/dass_21/",

        dasses: [],

    },
    methods : {
        retrieveDass : function() {
            axios.get(this.url_root + 'retrieve_dass_by_user_id.php')
			.then(function(response) {
				vm.dasses = response.data;
			});
        },

		redirectToCreate : function(e) {
			e.preventDefault();

			Swal.fire({
				title: 'Continue?',
				text: "The Depression, Anxiety and Stress Scale - 21 Items (DASS-21) is a set of three self-report scales designed to measure the emotional states of depression, anxiety and stress. If you are experiencing significant emotional difficulties you should contact your GP for a referral to a qualified professional.",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes',
				allowOutsideClick: false
			  }).then((result) => {
				if(result.value) {
					window.location = "http://localhost:8080/AAA/public/views/add_dass_21.php";
				}
			})
		}
    },
    created() {
        this.retrieveDass();
    }
})