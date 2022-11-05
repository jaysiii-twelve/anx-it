Vue.component('gad-management-datatable', {
	props : ['gads'],
	template : 
	`
        <div class="table-responsive">
            <table id="gad-table" class="table table-hover text-center">
                <tbody v-if="gads.length > 0">
                    <tr v-for="(gad, index) in gads">
                        <td>{{gad.GadId}}</td>
                        <td>{{gad.DateCreated}}</td>
                        <td>
                            <button @click="redirectToDetails(gad.GadId)" class="btn btn-light btn-sm font-weight-bold ml-2">Details</button>

							<button @click="redirectToSurveyReport(gad.GadId)" class="btn btn-light btn-sm font-weight-bold ml-2">Print Report</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
	`,
	data() {
		return {
			headers: [
				{ title: 'GAD No.' },
				{ title: 'Date Created' },
				{ title: 'Action' }
			]
		}
	},
	methods : {
		createTableHeader : function() {
			if(this.gads){
				if($.fn.dataTable.isDataTable('#gad-table')) $('#gad-table').DataTable().destroy();
				$('#gad-table').DataTable({
					ordering : false,
				  	columns: this.headers
				});
			}
		},
		redirectToDetails : function(gadId) {
			console.log(gadId);

			window.sessionStorage.setItem("gadId", gadId);

			window.location = "http://localhost:8080/AAA/public/views/gad_details.php";
		},

		redirectToSurveyReport : function(gadId) {
			console.log(gadId);

			window.sessionStorage.setItem("gadId", gadId);

			window.open("http://localhost:8080/AAA/public/views/gad_7_recommendation.php");
		}
	},
	updated() {
		this.createTableHeader();
	}
});

var vm = new Vue({
    el : "#vue-gad-7",
    data : {
        url_root : "/AAA/public/controller/gad_7/",

        gads: [],

    },
    methods : {
        retrieveGad : function() {
            axios.get(this.url_root + 'retrieve_gad_by_user_id.php')
			.then(function(response) {
				vm.gads = response.data;
			});
        },

		redirectToCreate : function(e) {
			e.preventDefault();

			Swal.fire({
				title: 'Continue?',
				text: "The Generalized Anxiety Disorder 7 (GAD-7) is a set of scales designed to measure the emotional states of depression, anxiety and stress. If you are experiencing significant emotional difficulties you should contact your GP for a referral to a qualified professional.",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes',
				allowOutsideClick: false
			  }).then((result) => {
				if(result.value) {
					window.location = "http://localhost:8080/AAA/public/views/add_gad_7.php";
				}
			})
		}
    },
    created() {
        this.retrieveGad();
    }
})