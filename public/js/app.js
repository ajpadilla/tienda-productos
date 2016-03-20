new Vue({
	el:'body',
	data:{
		showCustomModal: false,
		showResponseModal: false,
		nameClassification: '',
		errorsResponse: [],
		messageResponse: '',
		showErrors: false,
		checking: false,
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
			this.nameClassification = "";
		}
		,
		closeResponseModal: function() {
			this.showResponseModal = false;
		}
	},
	components:{
		modal: VueStrap.modal,
		classifications:{
			template: '#classifications-templete',
			data: function () {
				return{
					listClassifieds: [],
					searchQueryClassified: '',
					order: 1
				}
			},
			props:['items'],
			
			created: function() {
				this.$http.get('/admin/listAllClassifieds').then(function(response) {
					if(response.data.success){
						console.log(response);
						this.listClassifieds = response.data.classifications;
					}
				});
			}
		},
		
	}
});