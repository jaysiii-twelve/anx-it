Vue.component('k-management-datatable', {
	props : ['ks'],
	template : 
	`
        <div class="table-responsive">
            <table id="k-table" class="table table-hover text-center">
                <tbody v-if="ks.length > 0">
                    <tr v-for="(k, index) in ks">
						<td>{{k.IdNumber}}</td>
						<td>{{k.FullName}}</td>
						<td>{{k.TotalScore}}</td>
                        <td>{{k.DateCreated}}</td>
                        <td>
                            <button @click="redirectToDetails(k.KesslerId)" class="btn btn-light btn-sm font-weight-bold ml-2">Details</button>
							<button @click="redirectToSurveyReport(k.KesslerId)" class="btn btn-light btn-sm font-weight-bold ml-2">Print Report</button>
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
			if(this.ks){
				if($.fn.dataTable.isDataTable('#k-table')) $('#k-table').DataTable().destroy();
				$('#k-table').DataTable({
					ordering : false,
				  	columns: this.headers
				});
			}
		},
		redirectToDetails : function(kesslerId) {
			window.sessionStorage.setItem("kesslerId", kesslerId);

			window.location = "https://anx-it.herokuapp.com/public/views/admin/kessler_survey_details.php";
		},
		redirectToSurveyReport : function(kesslerId) {
			console.log(kesslerId);

			window.sessionStorage.setItem("kesslerId", kesslerId);

			window.open("https://anx-it.herokuapp.com/public/views/admin/kessler_survey_recommendation.php");
		}
	},
	updated() {
		this.createTableHeader();
	}
});

var vm = new Vue({
    el : "#vue-kessler-survey",
    data : {
        url_root : "/public/controller/admin/kessler/",

        ks: [],

    },
    methods : {
        retrieveKessler : function() {
            axios.get(this.url_root + 'retrieve_kessler.php')
			.then(function(response) {
				vm.ks = response.data;
			});
        },
    },
    created() {
        this.retrieveKessler();
    }
})