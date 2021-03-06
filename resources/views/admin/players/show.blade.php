@extends('admin.layouts.layout')
@section('content')


  <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-12 mt30">
			<div class="pull-left">
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ route('admin.players.index') }}"> Back to Lists</a>
			</div>
		</div>
		<div class="col-md-12">
		  <div class="card">
			<div class="card-header card-header-primary">
			  <h4 class="card-title ">View Player</h4>
			</div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-hover">
				  <tbody>
					<tr><th>ID</th><td>{{ $player->id }}</td></tr>
					<tr><th>Name</th><td>{{ $player->firstName.' '.$player->lastName }}</td></tr>
					<tr><th>Image</th>
					<td>
					@if(!empty($player->imageUri))
						<img src="{{url('public/'.$player->imageUri)}}" width="50" height="50">
					@else
						<img src="{{url('assets/images/noimg.png')}}" width="50" height="50">
					@endif
					</td></tr>
					<tr><th>Jersey Number</th><td>{{ $player->jerseyNumber }}</td></tr>
					<tr><th>Country</th><td>{{ $player->country }}</td></tr>
					<tr><th>Team</th><td>{{ $player->team->name }}</td></tr>
					<tr><th>History</th><td>{{ $player->history }}</td></tr>
					<tr><th>Created At</th><td>{{ $player->created_at }}</td></tr>
					<tr><th>Modified At</th><td>{{ $player->updated_at }}</td></tr>
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
@endsection