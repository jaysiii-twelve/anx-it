Vue.component('dass-management-datatable', {
	props : ['dasses'],
	template : 
	`
        <div class="table-responsive">
            <table id="dass-table" class="table table-hover text-center">
                <tbody v-if="dasses.length > 0">
                    <tr v-for="(dass, index) in dasses">
						<td>{{dass.IdNumber}}</td>
						<td>{{dass.FullName}}</td>
						<td>{{dass.TotalScore}}</td>
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

			window.location = "https://anx-it.herokuapp.com/public/views/admin/dass_survey_details.php";
		},
		redirectToSurveyReport : function(dassId) {
			console.log(dassId);

			window.sessionStorage.setItem("dassId", dassId);

			window.open("https://anx-it.herokuapp.com/public/views/admin/dass_survey_recommendation.php");
		}
	},
	updated() {
		this.createTableHeader();
	}
});

var vm = new Vue({
    el : "#vue-dass-survey",
    data : {
        url_root : "/public/controller/admin/dass/",

        dasses: [],

    },
    methods : {
        retrieveDass : function() {
            axios.get(this.url_root + 'retrieve_dass.php')
			.then(function(response) {
				vm.dasses = response.data;
			});
        },
    },
    created() {
        this.retrieveDass();
    }
})