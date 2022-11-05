Vue.component('user-management-datatable', {
	props : ['users'],
	template : 
	`
        <div class="table-responsive">
            <table id="user-table" class="table table-hover text-center">
                <tbody v-if="users.length > 0">
                    <tr v-for="(user, index) in users">
                        <td>{{user.IdNumber}}</td>
						<td>{{user.FirstName + " " + user.LastName}}</td>
                        <td>
							
							<button @click="redirectToDetails(user.UserId, user.FirstName, user.LastName)" class="btn btn-light btn-sm font-weight-bold ml-2">Message</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
	`,
	data() {
		return {
			headers: [
				{ title: 'ID' },
				{ title: 'Name' },
				{ title: 'Action' }
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
		},
		redirectToDetails: function(userId, firstName, lastName) {
			window.sessionStorage.setItem("receiverId", userId);
			window.sessionStorage.setItem("firstName", firstName);
			window.sessionStorage.setItem("lastName", lastName);

			window.location = "http://localhost:8080/AAA/public/views/psychiatrist/messages_details.php";
		}
	},
	updated() {
		this.createTableHeader();
	}
});


var vm = new Vue({
    el : "#vue-messages",
    data : {
        url_root : "/AAA/public/controller/psychiatrist/messages/",

        emailAddress : '',
        password : '',

		errors : [],
		error_title : '',

		error_design : {
			padding : '20px 20px 20px 20px',
			color : '#d41616'
		},

        showPassword : false,

        gads: [],
        dasses: [],
        ks: [],
        users: []

    },
    methods : {
        
        retrieveUser : function() {
            axios.get(this.url_root + 'retrieve_user.php')
			.then(function(response) {
				for(var index = 0; index < response.data.length; index++) {
					if(response.data[index].UserTypeDescription != "Super Admin") {
						vm.users.push(response.data[index]);
					}
				}
			});
        },
       
    },
    created() {
        this.retrieveUser();
    }
})