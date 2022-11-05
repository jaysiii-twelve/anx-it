var vm = new Vue({
    el : "#vue-messages-details",
    data : {
        url_root : "/public/controller/psychiatrist/messages/",

        messages: [],

		receiverId: '',
		messageText: '',
		fullName: '',

    },
    methods : {
        saveMessage: function() {
			this.receiverId = sessionStorage.getItem("receiverId");
			
			axios.post(this.url_root + 'save_text_message.php', {
				receiverId: this.receiverId,
				text: this.messageText
			}).then((response) => {
                console.log(response);
				vm.messageText = "";
            })
		},

		retrieveTextMessages: function() {
			axios.get(this.url_root + 'retrieve_text_messages.php?receiverId=' + sessionStorage.getItem("receiverId"))
			.then(function(response) {
				vm.messages = response.data;
			});
		},
    },
    created() {
        this.fullName = sessionStorage.getItem("firstName") + " " + sessionStorage.getItem("lastName");

		setInterval(() => {
			this.retrieveTextMessages();
		}, 500);
    }
})