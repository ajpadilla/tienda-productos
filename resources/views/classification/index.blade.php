@extends('layouts.main')

@section('title', 'Classification')

@section('content')
<button class="btn btn-default top-head" v-on:click="showCustomModal = true">
  Show custom modal
</button>
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
@endsection

