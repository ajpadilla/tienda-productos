new Vue({
	el:'body',
	data:{
		showCustomModal: false,
		showResponseModal: false,
		nameClassification: '',
		errorsResponse: [],
		messageResponse: '',
		showErrors: false
	},
	validators:{
		checkNameClassification: {
			message: '¡El nombre ya se encuentra registrado!',
			check: function (val) {
				return false;
			}
		},
	},
	methods:{
		createNewClassification: function() 
		{
			if(this.$validation1.valid)
			{
				Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#_token').getAttribute('value');
				this.$http.post('/admin/classification/store',{name: this.nameClassification}).then(function (response) {
					this.errorsResponse = [];
					this.showResponseModal = true;
					this.messageResponse = 'Clasificación' +' '+ this.nameClassification +" "+'agregada correctamente';
					this.nameClassification = '';
				}, function (errors) {
					this.showResponseModal = true;
					var errorsR = [];
					$.each(errors.data, function(index,value) {
						errorsR.push(value);
					} );
					this.errorsResponse = errorsR;
				});
			}else{
				this.showErrors = true;
			}
		},
		closeCustomModal: function() {
			this.showCustomModal = false;
			this.showErrors = false;
		}
		,
		closeResponseModal: function() {
			this.showResponseModal = false;
		}
	},
	components:{
		modal: VueStrap.modal
	}
});