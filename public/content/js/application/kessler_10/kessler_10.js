Vue.component('k-management-datatable', {
	props : ['ks'],
	template : 
	`
        <div class="table-responsive">
            <table id="k-table" class="table table-hover text-center">
                <tbody v-if="ks.length > 0">
                    <tr v-for="(k, index) in ks">
                        <td>{{k.KesslerId}}</td>
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
				{ title: 'Kessler No.' },
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

			window.location = "https://anx-it.herokuapp.com/public/views/kessler_10_details.php";
		},
		redirectToSurveyReport : function(kesslerId) {
			console.log(kesslerId);

			window.sessionStorage.setItem("kesslerId", kesslerId);

			window.open("https://anx-it.herokuapp.com/public/views/kessler_10_recommendation.php");
		}
	},
	updated() {
		this.createTableHeader();
	}
});

var vm = new Vue({
    el : "#vue-k",
    data : {
        url_root : "/public/controller/kessler/",

        ks: [],

    },
    methods : {
        retrieveKessler : function() {
            axios.get(this.url_root + 'retrieve_kessler_by_user_id.php')
			.then(function(response) {
				vm.ks = response.data;
			});
        },

		redirectToCreate : function(e) {
			e.preventDefault();

			Swal.fire({
				title: 'Continue?',
				text: "The K10 is a set of scales designed to measure the emotional states of depression, anxiety and stress. If you are experiencing significant emotional difficulties you should contact your GP for a referral to a qualified professional.",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes',
				allowOutsideClick: false
			  }).then((result) => {
				if(result.value) {
					window.location = "https://anx-it.herokuapp.com/public/views/add_kessler_10.php";
				}
			})
		}
    },
    created() {
        this.retrieveKessler();
    }
})