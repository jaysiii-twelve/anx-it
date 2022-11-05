Vue.component('gad-management-datatable', {
	props : ['gads'],
	template : 
	`
        <div class="table-responsive">
            <table id="gad-table" class="table table-hover text-center">
                <tbody v-if="gads.length > 0">
                    <tr v-for="(gad, index) in gads">
                        <td>{{gad.IdNumber}}</td>
                        <td>{{gad.FullName}}</td>
                        <td>{{gad.TotalScore}}</td>
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
				{ title: 'ID No.' },
				{ title: 'FullName' },
				{ title: 'Anxiety Level' },
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

			window.location = "http://localhost:8080/AAA/public/views/admin/gad_survey_details.php";
		},

		redirectToSurveyReport : function(gadId) {
			console.log(gadId);

			window.sessionStorage.setItem("gadId", gadId);

			window.open("http://localhost:8080/AAA/public/views/admin/gad_survey_recommendation.php");
		}
	},
	updated() {
		this.createTableHeader();
	}
});

var vm = new Vue({
    el : "#vue-gad-survey",
    data : {
        url_root : "/AAA/public/controller/admin/gad/",

        gads: [],

    },
    methods : {
        retrieveGad : function() {
            axios.get(this.url_root + 'retrieve_gad.php')
			.then(function(response) {
				vm.gads = response.data;
			});
        },
    },
    created() {
        this.retrieveGad();
    }
})