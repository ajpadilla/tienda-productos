@extends('layouts.main')

@section('title', 'Classification')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="page-header">		
			<div class="clearfix">
				<h3 class="content-title pull-left">Lista de clasificación de productos</h3>
			</div>
			<div class="description">Clasificación</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<button class="btn btn-primary pull-right" v-on:click="openModalCreateClassification">
				Crear Clasificación
			</button>
		</div>
		<div class="row">
			<div class="box border green">
				<div class="box-title">
					<h4><i class="fa fa-table"></i>Listado De Clasificación</h4>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive">
								<classifications></classifications>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<modal :show.sync="showCustomModal" effect="fade" width="400">
			<div slot="modal-header" class="modal-header">
				<button type="button" class="close" @click='closeCustomModal'>
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</button>
				<h4 class="modal-title">@{{ modalTitle }}</h4>
			</div>
			<div slot="modal-body" class="modal-body">
			<validator name="validation1">
				<form novalidate>
					<meta id="_token" value="{{ csrf_token() }}">
					<div class="name-field form-group">
			        	<input id="name" class="form-control" v-model="nameClassification" type="text" placeholder="Nombre" v-validate:name="['required']">
			      	</div>
					<div class="errors" v-show="showErrors">
						<p v-if="$validation1.name.required">¡Nombre requerido!</p>
						<!--<p v-if="$validation1.name.exist">¡Nombre existente!</p>
						<!--<validator-errors :validation="$validation1"></validator-errors>-->
					</div>
				</form>
			</validator>
			</div>
			<div slot="modal-footer" class="modal-footer">
				<button  v-show="modalCreateClassification" type="submit" value="send" class="btn btn-primary" @click='createNewClassification'>Crear</button>
				<button  v-show="modalEditClassification" type="submit" value="send" class="btn btn-primary" @click='editClassification'>Editar</button>
				<button type="button" class="btn btn-danger" @click='closeCustomModal'>Cancelar</button>
			</div>
		</modal>

		<modal :show.sync="showResponseModal" effect="fade" width="400">
			<div slot="modal-header" class="modal-header">
				<button type="button" class="close" @click='closeResponseModal'>
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</button>
				<h4 class="modal-title">Respuesta del servidor</h4>
			</div>
			<div slot="modal-body" class="modal-body">
				<div v-if="errorsResponse.length > 0">
					<ul class="list-group" v-for='error in errorsResponse'>
						<li class="list-group-item">@{{ error }}</li>
					</ul>
				</div>
				<div v-else>
					<p>@{{ messageResponse }}</p>
				</div>
			</div>
			<div slot="modal-footer" class="modal-footer">
			<button type="button" class="btn btn-warning btn-lg" style="width: 100%;" @click='closeResponseModal'>
				<span class="glyphicon glyphicon-ok-sign">
				</span>Close
			</div>
		</modal>
	</div>
</div>

<template id="classifications-templete">
	<div class="row">
		<div class="col-sm-6">
			<div class="dataTables_length">
				<label>Mostrar: 
					<select name="datatable_length" aria-controls="datatable" class="form-control input-sm" 
					v-model="numberItems" @click="selectMoreItems">
					<option value="10" selected>10</option>
					<option value="25">25</option>
					<option value="50">50</option><option value="100">100</option>
				</select>
			</label>
		</div>
	</div>
	<div class="col-sm-6">
		<div id="datatable_filter" class="dataTables_filter">
			<label>Buscar: 
				<input type="search" class="form-control input-sm" v-model="searchQueryClassified">
			</label>
		</div>
	</div>
</div>

<table class="table table-bordered table-striped"> 
	<thead>
		<tr>
			<th class="text-center"  @click="order = order * -1">
				Nombre
				<span class="arrow">
					<i :class="order > 0 ? 'fa fa-sort-asc' : 'fa fa-sort-desc'"></i>
				</span>
			</th>
			<th class="text-center"  @click="order = order * -1">
				Acciones
				<span class="arrow">
					<i :class="order > 0 ? 'fa fa-sort-asc' : 'fa fa-sort-desc'"></i>
				</span>
			</th>
		</tr>
	</thead>
	<tbody v-for="classification in listClassifieds 
	| filterBy searchQueryClassified in 'name' 
	| orderBy 'name' order">
	<tr>
		<td>@{{ classification.name }}</td>
		<td align="center">
			<a class="btn btn-default" v-on:click="openModalEdit(classification.id)"><em class="fa fa-pencil"></em></a>
			<a class="btn btn-danger" v-on:click="openModalDelete(classification)"><em class="fa fa-trash"></em></a>
		</td>
	</tr>
</tbody>
</table>
<div class="clearfix"></div>
<div class="table-footer">
	<div class="col col-xs-4">
	<div class="table-info">Del @{{ fromPage }} al @{{ toPage }} de @{{ totalItems }} registros</div>
	</div>
	<div class="col col-xs-8">
		<ul class="pagination pull-right">
		<!--class="disabled"-->
			<li :class="{'disabled': linkPreviousDisabled}">
				<a href="#" v-on:click="previousItems"><span class="glyphicon glyphicon-chevron-left"></span></a>
			</li>
			<!--<li class="active"><a href="#">1</a></li>-->
			<li v-for="item in lastPage" v-on:click="loadMoreItems($index+1)">
				<a href="#">@{{ $index + 1 }}</a>
			</li>
			<li :class="{'disabled': linkNextDisabled}">
				<a href="#" v-on:click="nextItems"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</li>
		</ul>
	</div>
</div>
</template>

@endsection

