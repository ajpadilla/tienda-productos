@extends('layouts.main')

@section('title', 'Classification')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="page-header">		
			<div class="clearfix">
				<h3 class="content-title pull-left">Lista de Classification de productos</h3>
			</div>
			<div class="description">Clasificación</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<button class="btn btn-primary pull-right" v-on:click="showCustomModal = true">
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
								<table class="table table-bordered table-striped"> 
									<thead>
										<tr>
											<th class="text-center">Nombre</th>
											<th class="text-center">Acciones</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Mohsin</td>
											<td align="center">
												<a class="btn btn-default"><em class="fa fa-pencil"></em></a>
												<a class="btn btn-danger"><em class="fa fa-trash"></em></a>
											</td>
										</tr>
									</tbody>
								</table>
								<div class="clearfix"></div>
								<div class="table-footer">
									<div class="col col-xs-4">
										<div class="table-info">Del 1 al 6 de 6 registros</div>
									</div>
									<div class="col col-xs-8">
										<ul class="pagination pull-right">
											<li class="disabled">
												<a href="#">
													<span class="glyphicon glyphicon-chevron-left"></span>
												</a>
											</li>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
										</ul>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<modal :show.sync="showCustomModal" effect="fade" width="400">
			<div slot="modal-header" class="modal-header">
				<h4 class="modal-title">
					<i>Custom</i> <code>Modal</code> <b>Title</b>
				</h4>
			</div>
			<div slot="modal-body" class="modal-body">Algo</div>
			<div slot="modal-footer" class="modal-footer">
				<button type="button" class="btn btn-default" @click='showCustomModal = false'>Exit</button>
				<button type="button" class="btn btn-success" @click='showCustomModal = false'>Custom Save</button>
			</div>
		</modal>
	</div>
</div>

@endsection

