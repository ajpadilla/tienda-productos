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
		modalTitle: '',
		modalCreateClassification: false,
		modalEditClassification: false,
		classificationItem: 0

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
		editClassification:function() {
			//console.log(this.classificationItem);
			if(this.$validation1.valid)
			{
				Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#_token').getAttribute('value');
				this.$http.post('/admin/classification/update/'+this.classificationItem.id,{name: this.nameClassification}).then(function (response) {
					console.log(response);
					this.errorsResponse = [];
					this.showResponseModal = true;
					this.messageResponse = 'Clasificación' +' '+ this.nameClassification +" "+'actualizado correctamente';
					this.nameClassification = '';
				}, function (errors) {
					if(errors.data) 
					{
						this.showResponseModal = true;
						var errorsR = [];
						$.each(errors.data, function(index,value) {
							errorsR.push(value);
						} );
						this.errorsResponse = errorsR;
					}
				});
			}else{
				this.showErrors = true;
			}
		},
		openModalCreateClassification: function() {
			this.showCustomModal = true;
			this.modalTitle = "Crear Nueva Clasificación";
			this.modalCreateClassification = true;
			this.modalEditClassification = false;
		},
		openModalEditClassification: function() {
			this.showCustomModal = true;
			this.modalTitle = "Editar Clasificación";
			this.modalCreateClassification = false;
			this.modalEditClassification = true;
		},
		closeCustomModal: function() {
			this.showCustomModal = false;
			this.showErrors = false;
			this.nameClassification = "";
		}
		,
		closeResponseModal: function() {
			this.showResponseModal = false;
		},
	},
	components:{
		modal: VueStrap.modal,
		classifications:{
			template: '#classifications-templete',
			data: function () {
				return{
					listClassifieds: [],
					searchQueryClassified: '',
					order: 1,
					numberItems: 10,
					currentPage: 0,
					lastPage: 0,
					fromPage: 0,
					toPage: 0,
					totalItems:0,
					buttonDisabled: false,
					linkNextDisabled: false,
					linkPreviousDisabled: false,
				}
			},
			props:['items'],
			
			created: function() {
				this.currentPage = 1;
				this.uploadItems();
			},

			methods:{
				uploadItems: function() {
					this.$http.get('/admin/listAllClassifieds/'+this.numberItems+'?page='+this.currentPage).then(function(response) {
						if(response.data.success){
							//console.log(response);
							this.listClassifieds = response.data.classifications.data;
							this.currentPage = response.data.classifications.current_page;
							this.fromPage = response.data.classifications.from;
							this.toPage = response.data.classifications.to;
							this.totalItems = response.data.classifications.total;
							this.lastPage = response.data.classifications.last_page;
						}
					});
				},
				loadMoreItems: function(indexPage) {
					this.currentPage = indexPage;
					this.uploadItems();
				},
				nextItems: function() {
					if (this.currentPage < this.lastPage) {
						this.currentPage+=1;
						this.uploadItems();
						return true;
					}
					this.linkNextDisabled = true;
				},
				previousItems: function() {
					if (this.currentPage > 1) {
						this.currentPage-=1;
						this.uploadItems();
						return true;
					}
					this.linkPreviousDisabled = true;
				},
				selectMoreItems: function() {
					this.uploadItems();
				},
				openModalEdit:function(itemId) {
					this.$parent.openModalEditClassification();
					this.$http.get('/admin/getData/'+itemId).then(function(response) {
						if (response.data.success) {
							this.$parent.classificationItem = response.data.classification;
							this.$parent.nameClassification = response.data.classification.name;
						}
					},
					function(response) {
						console.log(response);
					});
				},
				editItem: function() {
					
				}
			}
		},
		
	}
});