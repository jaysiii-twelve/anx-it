var vm = new Vue({
    el : "#vue-user-details",
    data : {
        url_root : "/AAA/public/controller/admin/user/",

        userId: '',
        firstName : '',
        middleName : '',
        lastName : '',
        birthDate : '',
        emailAddress : '',
        mobileNumber: '',
        address: '',
        password : '',
        image: '',
        userTypeId: 0,
        idNumber : '',
        departmentId: 0,
        courseId : 0,
        yearId : 0,
        street : '',
        barangay : '',
        city : '',

        file: '',

        users : [],

        departments: [],
        courses: [],
        years: [],
    },
    methods : {
        retrieveAllUser : function() {
            axios.get(this.url_root + 'retrieve_all_user.php')
			.then(function(response) {
				console.log(response);
				vm.users = response.data;
			});
        },
        retrieveDepartment : function() {
            axios.get(this.url_root + 'retrieve_department.php')
			.then(function(response) {
				console.log(response);
				vm.departments = response.data;
			});
        },

        retrieveCourse : function() {
            axios.get(this.url_root + 'retrieve_course.php')
			.then(function(response) {
				console.log(response);
				vm.courses = response.data;
			});
        },

        retrieveYear : function() {
            axios.get(this.url_root + 'retrieve_year.php')
			.then(function(response) {
				console.log(response);
				vm.years = response.data;
			});
        },
        retrieveUser : function() {
            axios.get(this.url_root + 'retrieve_user_by_user_id.php?userId='+ window.sessionStorage.getItem("userId"))
			.then(function(response) {

                vm.userId = response.data[0].UserId;
                vm.firstName = response.data[0].FirstName;
                vm.middleName = response.data[0].MiddleName;
                vm.lastName = response.data[0].LastName;
                vm.birthDate = response.data[0].BirthDate;
                vm.emailAddress = response.data[0].EmailAddress;
                vm.mobileNumber = response.data[0].MobileNumber;
                vm.address = response.data[0].Address;
                vm.image = "../../content/images/uploadedImage/" +response.data[0].ImageName;
                vm.userTypeId = response.data[0].UserTypeId;
                vm.idNumber = response.data[0].IdNumber;
                vm.departmentId = response.data[0].DepartmentId;
                vm.courseId = response.data[0].CourseId;
                vm.yearId = response.data[0].YearId;
                vm.street = response.data[0].Street;
                vm.barangay = response.data[0].Barangay;
                vm.city = response.data[0].City;
			});
        },

        redirectToMain: function(e) {
            e.preventDefault();

			Swal.fire({
				title: 'Continue?',
				text: "Are you sure you want to go to main page ?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes',
				allowOutsideClick: false
			  }).then((result) => {
				if(result.value) {
					window.location = "http://localhost:8080/AAA/public/views/admin/user.php";
				}
			})
        },
    },
    computed : {
		changeTitle : function() {
			if(this.file == '') {
				return 'Drag and Drop a file or Click Add Image';
			}
			else {
				return '';
			}
		},
	},
    created() {
        this.retrieveUser();
        this.retrieveAllUser();
        this.retrieveDepartment();
        this.retrieveCourse();
        this.retrieveYear();
    }
})