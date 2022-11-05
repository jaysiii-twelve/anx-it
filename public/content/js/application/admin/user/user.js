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
                        <td>{{user.UserTypeDescription}}</td>
						<td v-if="user.IsActive">Active</td>
						<td v-if="!user.IsActive">Inactive</td>
						<td v-if="user.IsApprove && !user.IsRejected">Approved</td>
						<td v-if="!user.IsApprove && !user.IsRejected">For Approval</td>
						<td v-if="!user.IsApprove && user.IsRejected">Disapproved</td>
                        <td>
							
							<button @click="redirectToDetails(user.UserId)" class="btn btn-light btn-sm font-weight-bold ml-2">Details</button>

							<button v-if="!user.IsApprove && !user.IsRejected" @click="approveUser(user.UserId)" class="btn btn-light btn-sm font-weight-bold ml-2">Approve</button>

							<button v-if="!user.IsApprove && !user.IsRejected" @click="disapproveUser(user.UserId)" class="btn btn-light btn-sm font-weight-bold ml-2">Disapprove</button>

                            <button v-if="user.IsApprove && !user.IsRejected" @click="redirectToEdit(user.UserId)" class="btn btn-light btn-sm font-weight-bold ml-2">Update</button>

                            <button v-if="user.IsActive && user.IsApprove && !user.IsRejected" @click="deleteUser(user.UserId, user.IsActive)" class="btn btn-danger btn-sm font-weight-bold ml-2">Delete</button>

                            <button v-if="!user.IsActive && user.IsApprove && !user.IsRejected" @click="restoreUser(user.UserId, user.IsActive)" class="btn btn-warning btn-sm font-weight-bold ml-2">Restore</button>

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
				{ title: 'User Type' },
				{ title: 'User Status' },
				{ title: 'Approval Status' },
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
		redirectToDetails : function(userId) {
			

			window.sessionStorage.setItem("userId", userId);

			window.location = "https://anx-it.herokuapp.com/public/views/admin/user_details.php";
		},
		redirectToEdit : function(userId) {
			

			window.sessionStorage.setItem("userId", userId);

			window.location = "https://anx-it.herokuapp.com/public/views/admin/update_user.php";
		},

		deleteUser : function(userId, isActive) {

			Swal.fire({
				title: '',
				text: "Delete this user ?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Delete',
				allowOutsideClick: false
			  }).then((result) => {
				if(result.value) {
					axios.post(vm.url_root + 'update_user_active_status.php', {
						userId : userId,
						isActive: isActive ? false : true
					}).then(function(response) {
						$(".pace").removeClass("pace-inactive");
                    	$(".pace").addClass("pace-active");
						setTimeout(() => {
							$(".pace").removeClass("pace-active");
							$(".pace").addClass("pace-inactive");
							Swal.fire({
								title : 'User status',
								text : 'User deleted successfully',
								icon : 'success',
								allowOutsideClick: false,
								timer : 3000,
								showConfirmButton : false
							}).then(() => {
								vm.retrieveUser();
							});
						}, 3000);
					});
				}
			})
		},

		restoreUser : function(userId, isActive) {

			Swal.fire({
				title: '',
				text: "Restore this user ?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#e67c02',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Restore',
				allowOutsideClick: false
			  }).then((result) => {
				if(result.value) {
					axios.post(vm.url_root + 'update_user_active_status.php', {
						userId : userId,
						isActive: isActive ? false : true
					}).then(function(response) {
						$(".pace").removeClass("pace-inactive");
                    	$(".pace").addClass("pace-active");
						setTimeout(() => {
							$(".pace").removeClass("pace-active");
							$(".pace").addClass("pace-inactive");
							Swal.fire({
								title : 'User status',
								text : 'User retored successfully',
								icon : 'success',
								allowOutsideClick: false,
								timer : 3000,
								showConfirmButton : false
							}).then(() => {
								vm.retrieveUser();
							});
						}, 3000);
					});
				}
			})
		},
		approveUser : function(userId) {
			Swal.fire({
				title: '',
				text: "Approve this user ?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#28a745',
				cancelButtonColor: '#c10c0c',
				confirmButtonText: 'Approve',
				allowOutsideClick: false
			  }).then((result) => {
				if(result.value) {
					axios.post(vm.url_root + 'approve_user.php', {
						userId : userId
					}).then(function(response) {
						console.log(response);
						$(".pace").removeClass("pace-inactive");
                    	$(".pace").addClass("pace-active");
						setTimeout(() => {
							$(".pace").removeClass("pace-active");
							$(".pace").addClass("pace-inactive");
							Swal.fire({
								title : 'Approval status',
								text : 'Approved successfully',
								icon : 'success',
								allowOutsideClick: false,
								timer : 3000,
								showConfirmButton : false
							}).then(() => {
								vm.retrieveUser();
							});
						}, 3000);
					});
				}
			})
		},
		disapproveUser : function(userId) {
			Swal.fire({
				title: '',
				text: "Disapprove this user ?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#c10c0c',
				cancelButtonColor: '#28a745',
				confirmButtonText: 'Disapprove',
				allowOutsideClick: false
			  }).then((result) => {
				if(result.value) {
					axios.post(vm.url_root + 'disapprove_user.php', {
						userId : userId
					}).then(function(response) {
						console.log(response);
						$(".pace").removeClass("pace-inactive");
                    	$(".pace").addClass("pace-active");
						setTimeout(() => {
							$(".pace").removeClass("pace-active");
							$(".pace").addClass("pace-inactive");
							Swal.fire({
								title : 'Disapproval status',
								text : 'Disapproved successfully',
								icon : 'success',
								allowOutsideClick: false,
								timer : 3000,
								showConfirmButton : false
							}).then(() => {
								vm.retrieveUser();
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
    el : "#vue-user",
    data : {
        url_root : "/public/controller/admin/user/",

        users: [],

    },
    methods : {
        retrieveUser : function() {
            axios.get(this.url_root + 'retrieve_user.php')
			.then(function(response) {
				console.log(response);
				vm.users = response.data;
			});
        },

		redirectToCreate : function(e) {
			e.preventDefault();

			
            window.location = "https://anx-it.herokuapp.com/public/views/admin/add_user.php";
		}
    },
    created() {
        this.retrieveUser();
    }
})