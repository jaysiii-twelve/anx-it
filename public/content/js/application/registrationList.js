Vue.component('user-management-datatable', {
	props : ['users'],
	template : 
	`
        <div class="table-responsive">
            <table id="user-table" class="table table-hover text-center">
                <tbody v-if="users.length > 0">
                    <tr v-for="(user, index) in users">
                        <td>{{user.LastName + ", " + user.FirstName}}</td>
						<td v-if="user.IsApprove">Approved</td>
						<td v-if="!user.IsApprove">For Approval</td>
                    </tr>
                </tbody>
            </table>
        </div>
	`,
	data() {
		return {
			headers: [
				{ title: 'Name' },
				{ title: 'Approval Status' }
			]
		}
	},
	methods : {
		createTableHeader : function() {
			if(this.users){
				if($.fn.dataTable.isDataTable('#user-table')) $('#user-table').DataTable().destroy();
				$('#user-table').DataTable({
					ordering : false,
				  	columns: this.headers
				});
			}
		}
	},
	updated() {
		this.createTableHeader();
	}
});

var vm = new Vue({
    el : "#vue-registration-list",
    data : {
        url_root : "/AAA/public/controller/admin/user/",

        users: [],
        

    },
    methods : {
        retrieveUser : function() {
            axios.get(this.url_root + 'retrieve_all_user.php')
			.then(function(response) {
				vm.users = response.data;
			});
        },
    },
    created() {
        this.retrieveUser();
    }
})