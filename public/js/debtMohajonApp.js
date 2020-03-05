new Vue({
	el: '#debtMohajonApp',
	data: {
		info: {
			payment_option: 'নগদ',
			mohajon_id: "",
			current_balance: "",
			balance_type: "",
			select_cash: "",
			cash: 0.00,
		},
		edit_info: {}
	},
	methods: {
		get_balance: function(event,id) {
			event.preventDefault();

			$(".current_balance").slideUp('fast');

			axios.post(this.$config.site_url + "mohajon/ajax_get_balance", {
				mohajon_id: id
			}).then(response => {
				console.log(response.data);

				this.info.current_balance = parseFloat(response.data);

				if(this.info.current_balance < 0) {
					this.info.balance_type = "(দেনা)";
				} else {
					this.info.balance_type = "(পাওনা)";
				}

				$(".current_balance").slideDown('fast');
			});
		},
		get_cash: function() {
			axios.post(this.$config.site_url + "mohajon/ajax_get_cash", {
				cash: 'amount'
			}).then(response => {
				this.info.cash = response.data;
				console.log(response.data)
			});
		},
	},
	mounted() {
		this.get_cash();
	},
});
